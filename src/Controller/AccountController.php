<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/account")
 */
class AccountController extends AbstractController
{



    /**
     * @Route("/",name="account")
     */
    public function index(): Response
    {
        return $this->render('account/index.html.twig', [
        ]);

    }
    /**
     * @Route("/activities",name="account.activities")
     */
    public function showActivities(): Response
    {
        return $this->render('account/showActivities.html.twig', [

        ]);

    }
    /**
     * @Route("/activities/delete/{activity}",name="account.activities.delete")
     */
    public function deleteActivity($activity): Response
    {
        return $this->render('account/deleteActivities.html.twig', [

        ]);

    }
    /**
     * @Route("/activities/modify/{activity}",name="account.activities.modify")
     */
    public function modifyActivity($activity): Response
    {
        return $this->render('account/modifyActivity.html.twig');

    }


}
