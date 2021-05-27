<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EventType;
use App\Form\FindEventsType;
use App\Form\FindPlacesType;
use App\Form\FindPlansType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchActivityController extends AbstractController
{
    #[Route('/search', name: 'search_activity')]
    public function index(): Response
    {
        $form = $this->createForm(FindPlansType::class);
        $eventOptions = $this->createForm(FindEventsType::class);
        $placeOptions = $this->createForm(FindPlacesType::class);
        $eventrepository = $this->getDoctrine()->getRepository('App:Evenement');
        $events = $eventrepository->findBy([],[],6) ;

        return $this->render('search_activity/findPlans.html.twig', [
            'form' => $form->createView(),
            'eventOptions' => $eventOptions->createView(),
            'placeOptions' => $placeOptions->createView(),
            'events' => $events,
        ]);



    }
}
