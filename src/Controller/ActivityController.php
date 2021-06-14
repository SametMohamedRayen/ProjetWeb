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
use Symfony\Component\Security\Core\Security;

class ActivityController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
        {
         $this->security = $security;
     }
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
        if ($this->security->isGranted('ROLE_USER')) {
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
                $img = $form->get('photo')->getData();
                if ($img) {
                    $imgname = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
                    $newimgname = $imgname.'-'.uniqid().'.'.$img->guessExtension();
                    try {
                        $img->move(
                            '%kernel.root_dir%/../assets/temp/indoor/',
                            $newimgname
                        );
                    } catch (FileException $e) {
                        $this->addFlash('fail','Error while trasnferring the picture uploaded !');
                    }
                }
                $ind->setPhoto('assets/temp/event/'.$newimgname);

                //COLOR
                $ind->setUser($this->security->getUser()->getAdresseMail());
                $manager->persist($ind);
                $manager->flush();
                $this->addFlash('success', 'L\'indoor ' . $form->get('name')->getData() . ' a été ajouté avec succés ! ');
            }
        }
        return($this->render('activity/indForm.html.twig',[
            'ind'=>$ind,
            'form'=>$form->createView(),
            'what'=>'Indoor'
        ]));}
        else{
            return $this->redirectToRoute('app_login');
        }
    }

    /**
     * @Route("/inout/evnend/evn",name="evn")
     */
    public function formevn(EntityManagerInterface $manager,Request $request)
    {if ($this->security->isGranted('ROLE_USER')) {
        $event = new Evenement();
        $form = $this->createForm(EventType::class,$event);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            if ($this->valid(
                $form->get('age_min')->getData(),
                $form->get('age_max')->getData(),
                0,0
            ))
            {
                //COLOR VARIABLE


                $img = $form->get('photo')->getData();
                if ($img) {
                    $imgname = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
                    $newimgname = $imgname.'-'.uniqid().'.'.$img->guessExtension();
                    try {
                        $img->move(
                            '%kernel.root_dir%/../assets/temp/event/',
                            $newimgname
                        );
                    } catch (FileException $e) {
                        $this->addFlash('fail','Error while trasnferring the picture uploaded !');
                    }
                    }
                $event->setPhoto('assets/temp/event/'.$newimgname);

                $event->setUser($this->security->getUser()->getAdresseMail());
                $manager->persist($event);
                $manager->flush();
                $this->addFlash('success', 'L\'evenement ' . $form->get('name')->getData() . ' a été ajouté avec succés ! ');
            }
        }
        return($this->render('activity/eventForm.html.twig',[
            'event'=>$event,
            'form'=>$form->createView(),
            'what'=>'event'
        ]));}
    else{
        return $this->redirectToRoute('app_login');
    }

    }

    /**
     * @Route("/inoout/evnend/end/",name="end")
     */
    public function formend(EntityManagerInterface $manager,Request $request)
    { if ($this->security->isGranted('ROLE_USER')) {
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
                //COL
                $img = $form->get('photo')->getData();
                if ($img) {
                    $imgname = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
                    $newimgname = $imgname.'-'.uniqid().'.'.$img->guessExtension();
                    try {
                        $img->move(
                            '%kernel.root_dir%/../assets/temp/endroit/',
                            $newimgname
                        );
                    } catch (FileException $e) {
                        $this->addFlash('fail','Error while trasnferring the picture uploaded !');
                    }
                }
                $endroit->setPhoto('assets/temp/event/'.$newimgname);

                $endroit->setUser($this->security->getUser()->getAdresseMail());
                $manager->persist($endroit);
                $manager->flush();
                $this->addFlash('success', 'L\'endroit ' . $form->get('name')->getData() . ' a été ajouté avec succés ! ');
            }
        }
        return($this->render('activity/endroitForm.html.twig',[
            'endroit' => $endroit,
            'form' => $form->createView(),
            'what'=>'Endroit'
        ]));}
    else{
        return $this->redirectToRoute('app_login');
        }
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
