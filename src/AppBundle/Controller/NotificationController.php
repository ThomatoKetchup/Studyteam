<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Notification;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("notification")
 */
class NotificationController extends Controller
{
    /**
     * @Route("/create", name="create_notification")
     */
    public function create(Request $request)
    {
        //Récupérer les filtres via le request
        $data = $request->query->get('data');

        $notification = new Notification();
        $notification->setData($data);

        //Récupérer le manager
        //Persist
        //Flush
    }
}
