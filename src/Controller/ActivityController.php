<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Indoor;
use App\Form\EndroitType;
use App\Entity\Endroit;
use App\Form\EventType;
use App\Form\IndoorFType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function formind(EntityManagerInterface $manager,Request $request)
    {
        $ind = new Indoor();
        $form = $this->createForm(IndoorFType::class,$ind);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            if ($this->valid(
                $form->get('age_min')->getData(),
                $form->get('age_max')->getData(),
                $form->get('price_min')->getData(),
                $form->get('price_max')->getData()
            ))
            {
                //FIX IMAGE DIRECTORY
                $img =$form->get('photo')->getData();
                $img->move('../../public/temp',uniqid());
                //COLOR VARIABLE
                $ind->setUser('ab'); //Insert here session variable for the user logged in
                $manager->persist($ind);
                $manager->flush();
                $this->addFlash('success', 'L\'indoor ' . $form->get('name')->getData() . ' a été ajouté avec succés ! ');
            }
        }
        return($this->render('activity/indForm.html.twig',[
            'ind'=>$ind,
            'form'=>$form->createView(),
            'what'=>'Indoor'
        ]));
    }

    /**
     * @Route("/inout/evnend/evn",name="evn")
     */
    public function formevn(EntityManagerInterface $manager,Request $request)
    {
        $event = new Evenement();
        $form = $this->createForm(EventType::class,$event);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            if ($this->valid(
                $form->get('age_min')->getData(),
                $form->get('age_max')->getData(),
                $form->get('price_min')->getData(),
                $form->get('price_max')->getData()
            ))
            {
                //COLOR VARIABLE
                $event->setUser('ab'); //Insert here session variable for the user logged in
                $manager->persist($event);
                $manager->flush();
                $this->addFlash('success', 'L\'evenement ' . $form->get('name')->getData() . ' a été ajouté avec succés ! ');
            }
        }
        return($this->render('activity/eventForm.html.twig',[
            'event'=>$event,
            'form'=>$form->createView(),
            'what'=>'Event'
        ]));
    }

    /**
     * @Route("/inoout/evnend/end",name="end")
     */
    public function formend(EntityManagerInterface $manager,Request $request)
    {
        $endroit = new Endroit();
        $form = $this->createForm(EndroitType::class,$endroit);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            if ($this->valid(
                $form->get('age_min')->getData(),
                $form->get('age_max')->getData(),
                $form->get('price_min')->getData(),
                $form->get('price_max')->getData()
            ))
            {
                //COLOR VARIABLE
                $endroit->setUser('ab'); //Insert here session variable for the user logged in
                $manager->persist($endroit);
                $manager->flush();
                $this->addFlash('success', 'L\'endroit ' . $form->get('name')->getData() . ' a été ajouté avec succés ! ');
            }
        }
        return($this->render('activity/endroitForm.html.twig',[
            'endroit' => $endroit,
            'form' => $form->createView(),
            'what'=>'Endroit'
        ]));
    }

    public function valid($agemin,$agemax,$pricemin,$pricemax)
    {
        if(($agemin>$agemax) ||($pricemax<$pricemin))
        {
            if ($agemax<$agemin)
                $this->addFlash('fail','Verify age interval !');
            if ($pricemin>$pricemax)
                $this->addFlash('fail','Verfiy prices interval');
            return false;
        }
        return true;
    }



}
