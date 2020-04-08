<?php

namespace App\Repository;

use App\Entity\CarColor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CarColor|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarColor|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarColor[]    findAll()
 * @method CarColor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarColorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarColor::class);
    }

    /**
     * @return array
     */
    public function findAllIds(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return CarColor[] Returns an array of CarColor objects
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
    public function findOneBySomeField($value): ?CarColor
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
