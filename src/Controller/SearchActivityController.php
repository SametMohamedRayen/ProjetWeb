<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\FindEventsType;
use App\Form\FindPlacesType;
use App\Form\FindPlansType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchActivityController extends AbstractController
{
    /**
     * @Route("/search",name="search")
     */
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'ActivityController',
        ]);
    }
    /**
     * @Route("/search/events",name="searchevents"), methods={"PUT"})
     */
    public function searchevents(Request $request, Evenement $event=null): Response
    {
        $form = $this->createForm(FindEventsType::class,$event);
        $form->handleRequest($request);

        if($form->isSubmitted() ) {
            $data = $form->getData();
            dd($data);
        }
        else{
            $eventrepository = $this->getDoctrine()->getRepository('App:Evenement');
            $events = $eventrepository->findBy([], [], 9);
        }

        return $this->render('search/findEvents.html.twig', [
            'eventOptions' => $form->createView(),
            'events' => $events,
        ]);


    }
    /**
     * @Route("/search/places",name="searchplaces")
     */
    public function searchplaces(): Response
    {
        $placeOptions = $this->createForm(FindPlacesType::class);
        $placerepository = $this->getDoctrine()->getRepository('App:Endroit');
        $places = $placerepository->findBy([], [], 9);
        return $this->render('search/findPlaces.html.twig', [
            'placeOptions' => $placeOptions->createView(),
            'places' => $places,
        ]);


    }

}
