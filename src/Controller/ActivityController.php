<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Indoor;
use App\Form\EndroitType;
use App\Entity\Endroit;
use App\Form\EventType;
use App\Form\IndoorFType;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivityController extends AbstractController
{
    /**
     * @Route("/activity", name="activity")
     */
    public function index(): Response
    {
        return $this->render('activity/index.html.twig', [
            'controller_name' => 'ActivityController',
        ]);
    }
    /**
     * @Route("/inout" ,name="inout")
     */
    public function chooseType()
    {
        return $this->render('activity/inout.html.twig');
    }

    /**
     * @Route ("/inout/evnend",name="evnend")
     */
    public function choose()
    {
        return $this->render("activity/evnend.html.twig");
    }

    /**
     * @Route("/inout/ind",name="ind")
     */
    public function formind()
    {
        $ind = new Indoor();
        $form = $this->createForm(IndoorFType::class,$ind);
        return($this->render('activity/indForm.html.twig',[
            'ind'=>$ind,
            'form'=>$form->createView()
        ]));
    }

    /**
     * @Route("/inout/evnend/evn",name="evn")
     */
    public function formevn()
    {
        $event = new Evenement();
        $form = $this->createForm(EventType::class,$event);
        return($this->render('activity/eventForm.html.twig',[
            'event'=>$event,
            'form'=>$form->createView()
        ]));
    }

    /**
     * @Route("/inoout/evnend/end",name="end")
     */
    public function formend(EntityManagerInterface $manager)
    {
        $endroit = new Endroit();
        $form = $this->createForm(EndroitType::class,$endroit);
        if($form->isSubmitted())
        {
            dd($endroit);
            //$manager->persist($endroit);
            //$manager->flush();
            //$this->addFlash('succes','L\'endroit ajouté avec succées');
        }
        return($this->render('activity/endroitForm.html.twig',[
            'endroit' => $endroit,
            'form' => $form->createView()
        ]));
    }


}
