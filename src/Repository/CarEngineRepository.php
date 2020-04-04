<?php

namespace App\Repository;

use App\Entity\CarEngine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CarEngine|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarEngine|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarEngine[]    findAll()
 * @method CarEngine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarEngineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarEngine::class);
    }

    // /**
    //  * @return CarEngine[] Returns an array of CarEngine objects
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
    public function findOneBySomeField($value): ?CarEngine
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
