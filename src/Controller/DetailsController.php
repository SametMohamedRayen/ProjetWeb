<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    /**
     * @Route("/search/events/details/{id?1}" ,name="eventdetails")
     */
    public function eventdetails ($id ) : Response
    {
        $eventrepository = $this->getDoctrine()->getRepository('App:Evenement');
        $event = $eventrepository->findOneBy(["id" => $id]);

        return $this->render('details/detailsEvent.html.twig', [
            'event' => $event,
        ]);
    }

    /**
     * @Route("/search/places/details/{id?1}" ,name="placedetails")
     */
    public function placedetails ($id ) : Response
    {
        $placerepository = $this->getDoctrine()->getRepository('App:Endroit');
        $place = $placerepository->findOneBy(["id" => $id]);

        return $this->render('details/detailsPlace.html.twig', [
            'place' => $place,
        ]);
    }

    /**
     * @Route("/search/indoor/details/{id?1}" ,name="indoordetails")
     */
    public function indoordetails ($id ) : Response
    {
        $indoorrepository = $this->getDoctrine()->getRepository('App:Indoor');
        $indoor = $indoorrepository->findOneBy(["id" => $id]);

        return $this->render('details/detailsIndoor.html.twig', [
            'indoor' => $indoor,
        ]);
    }
}
