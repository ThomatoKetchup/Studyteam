<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Publication;
use AppBundle\Entity\Groupe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Groupe controller.
 *
 * @Route("groupe")
 */
class GroupeController extends Controller
{
    /**
     * Lists all groupe entities.
     *
     * @Route("/", name="groupe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $groupes = $this->getUser()->getGroupes();
        /*$em = $this->getDoctrine()->getManager();
        $users=$this->getUser();
        $groupes = $em->getRepository('AppBundle:Groupe')->findBy(
            array('userExpediteur' => ->getUser()),
            $orderBy = null,
            $limit  = null,
            $offset = null
        );;;*/

        return $this->render('groupe/index.html.twig', array(
            'groupes' => $groupes,
        ));
    }


    /**
     * Finds and displays a groupe entity.
     *
     * @Route("/{id}", name="groupe_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request,Groupe $groupe)
    {
        $em = $this->getDoctrine()->getManager();

        /*Créer une nouvelle publication */
        $publication = new Publication();
        $form = $this->createForm('AppBundle\Form\PublicationType', $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /*La publication appartient à ce groupe, à pour auteur l'user actuel et est écrit à la date actuelle*/
            $publication->setGroupe($groupe);
            $publication->setAuthor($this->getUser());
            $publication->setDate(new \DateTime("now"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();
            return $this->redirectToRoute('groupe_show', array('id' => $groupe->getId()));
        }


        //$groupes = $this->getUser()->getGroupes();
        //dump($this->getGroupe());die;
        $users = $groupe->getUsers();

        //On récupère les publications liées à ce groupe du plus récent au plus ancien
        $publications = $em->getRepository('AppBundle:Publication')->findBy(
            array('groupe' => $groupe),
            array('date' => 'desc'),
            $limit  = 5,
            $offset = null
        );

        return $this->render('groupe/show.html.twig', array(
            'form' => $form->createView(),
            'groupe' => $groupe,
            'users' => $users,
            'publications'=>$publications,
        ));
    }



    /**
     * Ajoute l'utilisateur courant au groupe passé en paramètre
     *
     * @Route("/add/{id}", name="group_add_user")
     * @Method({"GET"})
     */
    public function addUserAction(Groupe $groupe){
        $groupe->addUser($this->getUser());
        $this->getUser()->addGroupe($groupe);
        $em = $this->getDoctrine()->getManager();
        $em->persist($groupe);
        $em->flush();
        return $this->redirectToRoute('groupe_show', array('id' => $groupe->getId()));
    }

}
