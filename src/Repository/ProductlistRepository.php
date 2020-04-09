<?php

namespace App\Repository;

use App\Entity\Productlist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Productlist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Productlist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Productlist[]    findAll()
 * @method Productlist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductlistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Productlist::class);
    }

    // /**
    //  * @return Productlist[] Returns an array of Productlist objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Productlist
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
