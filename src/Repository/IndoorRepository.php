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
