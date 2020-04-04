<?php

namespace App\Repository;

use App\Entity\CarChassis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CarChassis|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarChassis|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarChassis[]    findAll()
 * @method CarChassis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarChassisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarChassis::class);
    }

    // /**
    //  * @return CarChassis[] Returns an array of CarChassis objects
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
    public function findOneBySomeField($value): ?CarChassis
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
