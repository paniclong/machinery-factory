<?php

namespace App\Repository;

use App\Entity\CarSpecifications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CarSpecifications|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarSpecifications|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarSpecifications[]    findAll()
 * @method CarSpecifications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarSpecificationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarSpecifications::class);
    }

    // /**
    //  * @return CarSpecifications[] Returns an array of CarSpecifications objects
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
    public function findOneBySomeField($value): ?CarSpecifications
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
