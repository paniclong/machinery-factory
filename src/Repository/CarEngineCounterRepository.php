<?php

namespace App\Repository;

use App\Entity\CarEngineCounter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CarEngineCounter|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarEngineCounter|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarEngineCounter[]    findAll()
 * @method CarEngineCounter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarEngineCounterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarEngineCounter::class);
    }

    // /**
    //  * @return CarEngineCounter[] Returns an array of CarEngineCounter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarEngineCounter
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
