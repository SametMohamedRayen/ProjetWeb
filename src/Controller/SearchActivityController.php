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

    #[Route('/search/events', name: 'searchevents')]
    public function index(): Response
    {
    }

    public function searchevents(): Response
    {
        $eventOptions = $this->createForm(FindEventsType::class);
        $eventrepository = $this->getDoctrine()->getRepository('App:Evenement');
        $events = $eventrepository->findBy([], [], 9);

        return $this->render('search/findEvents.html.twig', [
            'eventOptions' => $eventOptions->createView(),
            'events' => $events,
        ]);


    }

    #[Route('/search/places', name: 'searchplaces')]
    public function searchplaces(): Response
    {
        $placeOptions = $this->createForm(FindPlacesType::class);

        return $this->render('search/findPlaces.html.twig', [
            'placeOptions' => $placeOptions->createView(),
        ]);


    }

}
