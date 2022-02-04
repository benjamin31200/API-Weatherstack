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


    //  * @return ListCity[] Returns an array of ListCity objects
    //  */

    public function findByUserId(int $userId)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM list_city l
            WHERE l.user_id = :user
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['user' => $userId]);
        return $resultSet->fetchAllAssociative();
    }

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
