<?php

namespace App\Controller;

use App\Entity\Endroit;
use App\Entity\Evenement;
use App\Entity\Indoor;
use Doctrine\ORM\EntityManagerInterface;
use ContainerBi1bDen\getEndroitRepositoryService;
use Doctrine\ORM\EntityManager;
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
     * @Route("/activities/events/{page?1}",name="account.activities.event")
     */
    public function showEvents($page): Response
    {

            $repository = $this->getDoctrine()->getRepository(Evenement::class);


        /*$user = $this->getUser();

        if($user && !in_array('ROLE',$user->getRoles())) {
            $conditions = ['user' => $user];
        }*/

        $activities = $repository->findByUser(/*$user->getAdresseMail()*/ 'tasnim@gmail.tn');
            $offset = 12;
            $maxpage = count( $activities)/$offset;
            $activities2= null;
            $j=1;
            for($i=($page-1)*$offset;$i<($page-1)*$offset+$offset;$i++)
            {
                if(isset($activities[$i])) {
                    $activities2[$j] = $activities[$i];
                    $j++;
                }
            }
        return $this->render('account/showEvents.html.twig', [
            'activities'=> $activities2,
            'page'=>$page,
            'maxpage'=> $maxpage,

        ]);
    }

    /**
     * @Route("/activities/places/{page?1}",name="account.activities.places")
     */
    public function showPlaces($page): Response
    {

        $repository = $this->getDoctrine()->getRepository(Endroit::class);
        /*$user = $this->getUser();
        if($user && !in_array('ROLE',$user->getRoles())) {
            $conditions = ['user' => $user];
        }*/

        $activities = $repository->findByUser(/*$user->getAdresseMail()*/ 'tasnim@gmail.tn');
        $offset = 12;
        $maxpage = count( $activities)/$offset;
        $activities2= null;
        $j=1;
        for($i=($page-1)*$offset;$i<($page-1)*$offset+$offset;$i++)
        {
            if(isset($activities[$i])) {
                $activities2[$j] = $activities[$i];
                $j++;
            }
        }
        return $this->render('account/showPlaces.html.twig', [
            'activities'=> $activities2,
            'page'=>$page,
            'maxpage'=> $maxpage,

        ]);

    }

    /**
     * @Route("/activities/indoor/{page?1}",name="account.activities.indoor")
     */
    public function showIndoor($page): Response
    {

        $repository = $this->getDoctrine()->getRepository(Indoor::class);
        /*$user = $this->getUser();
        if($user && !in_array('ROLE',$user->getRoles())) {
            $conditions = ['user' => $user];
        }*/

        $activities = $repository->findByUser(/*$user->getAdresseMail()*/ 'tasnim@gmail.tn');
        if (count($activities)){
            $offset = 12;
            $maxpage = count( $activities)/$offset;
            $activities2= null;
            $j=1;
            for($i=($page-1)*$offset;$i<($page-1)*$offset+$offset;$i++)
            {
                if(isset($activities[$i])) {
                    $activities2[$j] = $activities[$i];
                    $j++;
                }
            }
            return $this->render('account/showIndoor.html.twig', [
                'activities'=> $activities2,
                'page'=>$page,
                'maxpage'=> $maxpage,

            ]);
        }else{
            $this->addFlash('error', "You haven't shared any Indoor activities yet , but late is better than never");
            return $this->redirectToRoute('account.activities.choice');
        }
        }



    /**
     * @Route("/activities",name="account.activities.choice")
     */
    public function chooseActivities(): Response
    {
        return $this->render('account/chooseActivities.html.twig');

    }


    /**
     * @Route("/activities/delete/{type}/{id}",name="account.activities.delete")
     */
    public function deleteActivity($type ,$id ,EntityManagerInterface $manager): Response
    {
        //Getting object by id
        if ($type == 1) {
            $activity = $this->getDoctrine()->getRepository(Evenement::class)->findOneById($id);
            $route ='account.activities.event';
        }else if ($type == 2){
            $activity = $this->getDoctrine()->getRepository(Endroit::class)->findOneById($id);
            $route ='account.activities.place';
        } else {
            $activity = $this->getDoctrine()->getRepository(Indoor::class)->findOneById($id);
            $route ='account.activities.indoor';
            }

            if ($activity) {
            $Name =$activity->getName();
            $manager->remove($activity);
            $manager->flush();
            $this->addFlash('success', " Plan $Name was succesfully deleted");
            } else {
            $this->addFlash('error', "Plan doesn't exist");
            }

        return $this->redirectToRoute($route);


    }

    /**
     * @Route("/event/modify/event/{id}",name="account.event.modify")
     */
    public function modifyEvent($id): Response
    {
        return $this->render('account/modifyEvent.html.twig');

    }

    /**
     * @Route("/event/modify/place/{id}",name="account.place.modify")
     */
    public function modifyPlace($id): Response
    {
        return $this->render('account/modifyPlace.html.twig');

    }
    /**
     * @Route("/event/modify/indoor/{id}",name="account.indoor.modify")
     */
    public function modifyIndoor($id): Response
    {


        return $this->render('account/modifyIndoor.html.twig');

    }

}
