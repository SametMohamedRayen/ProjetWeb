<?php

namespace App\Controller;

use App\Entity\Evenement;
use ContainerBi1bDen\getEndroitRepositoryService;
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
     * @Route("/activities/{type}",name="account.activities")
     */
    public function showActivities($type): Response
    {
         if ($type == "place") {
             $repository = $this->getDoctrine()->getRepository(endroit::class);
         }else if ($type == "event"){
             $repository = $this->getDoctrine()->getRepository(event::class);
         }else {
             $repository = $this->getDoctrine()->getRepository(indoor::class);
         }


        $user = $this->getUser();

        if($user && !in_array('ROLE',$user->getRoles())) {
            $conditions = ['user' => $user];
        }
        $Activities = $repository->findByUser($user->getUsername());

        return $this->render('account/showActivities.html.twig', [
            'activities'=> $Activities,
            'type'=>$type

        ]);

    }
    /**
     * @Route("/activities",name="account.activities.choice")
     */
    public function chooseActivities(): Response
    {


        return $this->render('account/chooseActivities.html.twig');

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
     * @Route("/activities/modify/{activity}/",name="account.activities.modify")
     */
    public function modifyActivity($activity): Response
    {
        return $this->render('account/modifyActivity.html.twig');

    }

}
