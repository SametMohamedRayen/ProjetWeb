<?php

namespace App\Repository;

use App\Entity\Indoor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Indoor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Indoor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Indoor[]    findAll()
 * @method Indoor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndoorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Indoor::class);
    }



    public function recherche($obj){

        $criteres = [
            "name" => $obj->getName(),
            "age_min"=> $obj->getAgeMin(),
            "age_max" => $obj->getAgeMax(),
            "eco_friendly"=>$obj->getEcoFriendly(),
            "price_max"=> $obj->getPriceMax(),
            "price_min" => $obj->getPriceMin(),
            "target" => $obj->getTarget(),

        ];

        $result = $this->createQueryBuilder('i');
        foreach ($criteres as $critere => $valeur ){
            if($valeur !=null){
                if($critere == "price_min"){
                    $result->andWhere('i.price_min >= :'.$critere);
                }
                elseif ($critere=="price_max"){
                    $result->andWhere('i.price_max <= :'.$critere);
                }
                elseif ($critere=="age_min"){
                    $result->andWhere('i.age_min >= :'.$critere);
                }
                elseif ($critere=="age_max"){
                    $result->andWhere('i.age_max <= :'.$critere);
                }
                else{
                    $result->andWhere('i.'.$critere.' = :'.$critere);
                }

                $result->setParameter($critere,$valeur);

            }
        }

        return $result->getQuery()
            ->getResult();

    }


    // /**
    //  * @return Indoor[] Returns an array of Indoor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Indoor
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
