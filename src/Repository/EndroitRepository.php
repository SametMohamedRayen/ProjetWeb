<?php

namespace App\Repository;

use App\Entity\Endroit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Endroit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Endroit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Endroit[]    findAll()
 * @method Endroit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EndroitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Endroit::class);
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
            "price_max"=> $obj->getPriceMax(),
            "price_min" => $obj->getPriceMin(),
            "location" => $obj->getLocation(),
            "open" => $obj->getOpen(),
            "close" => $obj->getClose(),


        ];

        $result = $this->createQueryBuilder('e');
        foreach ($criteres as $critere => $valeur ){
            if($valeur !=null){
                $result->andWhere('e.'.$critere.' = :'.$critere);
                $result->setParameter($critere,$valeur);
            }
        }

        return $result->getQuery()
            ->getResult();

    }




    // /**
    //  * @return Endroit[] Returns an array of Endroit objects
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
    public function findOneBySomeField($value): ?Endroit
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
