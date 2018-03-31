<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Groupe;
use AppBundle\Repository\GroupeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class SearchController extends Controller
{
    /**
     * @Route("/searchgroup", name="groupe_search")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\SearchType');
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $groupes = $em->getRepository('AppBundle:Groupe')->findAll();

        $searchResult=null;

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $searchResult = $em->getRepository('AppBundle:Groupe')->searchGroup($data);
            if($searchResult==null) $this->addFlash("bat-alarm", "Aucun résultat ne correspond à votre recherche");
        }

        // Créer un groupe formulaire

        $groupe = new Groupe();
        $groupform = $this->createForm('AppBundle\Form\GroupeType', $groupe);
        $groupform->handleRequest($request);

         if ($groupform->isSubmitted() && $groupform->isValid()) {
            $this->getUser()->addGroupe($groupe);
            $groupe->addUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();
            return $this->redirectToRoute('groupe_show', array('id' => $groupe->getId()));
        }

        return $this->render('search/search.html.twig', array(
            'groupform' => $groupform->createView(),
            'form' => $form->createView(),
            'searchResult' => $searchResult,
            'groupes' => $groupes));
    }
}