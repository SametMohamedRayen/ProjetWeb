<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    public function recherche($obj){
       /*
        -description: "1"
            -number: 1*/
        $criteres = [
            "name" => $obj->getName(),
            "age_min"=> $obj->getAgeMin(),
            "age_max" => $obj->getAgeMax(),
            "eco_friendly"=>$obj->getEcoFriendly(),
            "date"=>$obj->getDate(),
            "price_max"=> $obj->getPriceMax(),
            "price_min"=> $obj->getPriceMin(),
            "duration"=> $obj->getDuration(),
            "number" => $obj->getNumber(),
        ];

        $result = $this->createQueryBuilder('e');
        foreach ($criteres as $critere => $valeur ){
            if($valeur !=null){
                if($critere == "price_min"){
                    $result->andWhere('e.'.$critere.' >= :'.$critere);
                }
                elseif ($critere=="price_max"){
                    $result->andWhere('e.'.$critere.' <= :'.$critere);
                }
                else{
                    $result->andWhere('e.'.$critere.' = :'.$critere);
                }

                $result->setParameter($critere,$valeur);

            }
        }

            return $result->getQuery()
            ->getResult();

    }


    // /**
    //  * @return Evenement[] Returns an array of Evenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evenement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
