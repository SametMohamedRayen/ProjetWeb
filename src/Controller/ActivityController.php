<?php

namespace App\Controller;

use App\Form\EndroitType;
use App\Entity\Endroit;
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
        //FORM FOR INDOOR
    }

    /**
     * @Route("/inout/evnend/evn",name="evn")
     */
    public function formevn()
    {
        //FORM EVENT
    }

    /**
     * @Route("/inoout/evnend/end",name="end")
     */
    public function formend()
    {
        $endroit = new Endroit();
        $form = $this->createForm(EndroitType::class,$endroit);
        return($this->render('activity/endroitForm.html.twig',[
            'endroit' => $endroit,
            'form' => $form->createView()
        ]));
    }


}
