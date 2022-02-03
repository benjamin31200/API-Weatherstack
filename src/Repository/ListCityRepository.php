<?php

namespace App\Repository;

use App\Entity\ListCity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListCity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListCity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListCity[]    findAll()
 * @method ListCity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListCityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListCity::class);
    }

    // /**
    //  * @return ListCity[] Returns an array of ListCity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListCity
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
