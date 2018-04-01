<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("user")
 */
class UserController extends Controller
{
    /**
     * Finds and displays a user entity.
     * Et permet de modifier de par les modal
     *
     * @Route("/{id}", name="user_show")
     * @Method({"GET","POST"})
     */
    public function showAction(Request $request,User $user)
    {
        // $deleteForm = $this->createDeleteForm($user);
        /*Editez mon profil*/
        $editForm = $this->createForm('AppBundle\Form\UserType', $user);
        $editForm->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();


        //inutile
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $user = $editForm->getData(); //Demandez a expliquez cette ligne
            $file = $user->getBrochure();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $user->setBrochure($fileName);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        /*Envoyez un message*/
        $message = new Message();
        $form = $this->createForm('AppBundle\Form\MessageType', $message);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setUserExpediteur($this->getUser());
            $message->setUserDestinataire($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            //Pour ne pas être redirigé
            //return $this->redirectToRoute('controller_index', array('id' => $message->getId()));
        }


        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'edit_form' => $editForm->createView(),
            'message_form' => $form->createView(),
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }




    /**
     * Deletes a user entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * Creates a new message entity.
     *
     * @Route("/{id}", name="message_new")
     * @Method({"GET", "POST"})
     */
    public function newMessageAction(Request $request)
    {
        $message = new Message();
        $form = $this->createForm('AppBundle\Form\MessageType', $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setDestinataire();
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
