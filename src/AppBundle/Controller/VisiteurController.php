<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;


class VisiteurController extends Controller
{
    /**
     * Lists all profil entities.
     *
     * @Route("/visiteur", name="visiteur_index")
     * @Method("GET")
     */
    public function visiteurAction()
    {
        return $this->render('visiteur/index.html.twig');
    }
}