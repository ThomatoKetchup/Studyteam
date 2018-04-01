<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Form\MessageType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Message controller.
 *
 * @Route("message")
 */
class MessageController extends Controller
{
    /**
     * Lists all message entities.
     *
     * @Route("/", name="message_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sendMessages = $em->getRepository('AppBundle:Message')->findBy(
            array('userExpediteur' => $this->getUser()),
            $orderBy = null,
                $limit  = null,
                $offset = null
        );;

        $receivedMessages = $em->getRepository('AppBundle:Message')->findBy(
            array('userDestinataire' => $this->getUser()),
            $orderBy = null,
            $limit  = null,
            $offset = null
        );;

        return $this->render('message/index.html.twig', array(
            'sendMessages' => $sendMessages,
            'receivedMessages'=> $receivedMessages,
        ));
    }


    /**
     * Creates a new message entity.
     *
     * @Route("/user/{id}", name="message_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $message = new Message();
        $message->setDestinataire(1);
        $message->setExpediteur(2);
        $form = $this->createForm('AppBundle\Form\MessageType', $message);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('message_show', array('id' => $message->getId()));
        }

        return $this->render('user/show.html.twig', array(
            'message' => $message,
            'message_form' => $form->createView(),
        ));
    }
    
}
