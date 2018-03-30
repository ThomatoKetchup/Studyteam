<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Profil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Membre controller.
 *
 * @Route("membre")
 */
class MembreController extends Controller
{
    /**
     * Lists all profil entities.
     *
     * @Route("/", name="controller_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('membre.html.twig');
    }




}