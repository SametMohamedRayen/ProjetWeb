<?php

namespace App\Controller;

use App\Entity\Endroit;
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
     * @Route("/search/events/{page?1}",name="searchevents"), methods={"POST"})
     */
    public function searchevents(Request $request, Evenement $event=null, $page): Response
    {
        $form = $this->createForm(FindEventsType::class,$event);
        $form->handleRequest($request);

        if(($form->isSubmitted()) ) {
            $data = $form->getData();
            $eventrepository = $this->getDoctrine()->getRepository('App:Evenement');
            $events = $eventrepository->recherche($data);
        }
        else{
            $eventrepository = $this->getDoctrine()->getRepository('App:Evenement');
            $events = $eventrepository->findAll();
        }

        //PAGINATION
        $offset = 12;
        $maxpage = count($events)/$offset;
        $events2= null;
        $j=1;
        for($i=($page-1)*$offset;$i<($page-1)*$offset+$offset;$i++)
        {
            if(isset($events[$i])) {
                $events2[$j] = $events[$i];
                $j++;
            }
        }

        return $this->render('search/findEvents.html.twig', [
            'eventOptions' => $form->createView(),
            'events' => $events2,
            'page'=> $page,
            'maxpage'=> $maxpage,
        ]);


    }



    /**
     * @Route("/search/places/{page?1}",name="searchplaces"), methods={"POST"})
     */
    public function searchplaces(Request $request, Endroit $places=null, $page): Response
    {
        $form = $this->createForm(FindPlacesType::class,$places);
        $form->handleRequest($request);

        if(($form->isSubmitted()) ) {
            $data = $form->getData();
            $placerepository = $this->getDoctrine()->getRepository('App:Endroit');
            $places = $placerepository->recherche($data);
        }
        else{
            $placerepository = $this->getDoctrine()->getRepository('App:Endroit');
            $places = $placerepository->findAll();
        }

        //PAGINATION
        $offset = 12;
        $maxpage = count($places)/$offset;
        $places2= null;
        $j=1;
        for($i=($page-1)*$offset;$i<($page-1)*$offset+$offset;$i++)
        {
            if(isset($places[$i])) {
                $places2[$j] = $places[$i];
                $j++;
            }
        }

        return $this->render('search/findPlaces.html.twig', [
            'placeOptions' => $form->createView(),
            'places' => $places2,
            'page'=> $page,
            'maxpage'=> $maxpage,
        ]);
    }

}
