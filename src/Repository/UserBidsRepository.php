<?php

namespace App\Repository;

use App\Entity\UserBids;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserBids|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserBids|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserBids[]    findAll()
 * @method UserBids[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserBidsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserBids::class);
    }

    // /**
    //  * @return UserBids[] Returns an array of UserBids objects
    //  */

//    public function findByExampleField($value)
//    {
//        return $this->createQueryBuilder('u')
//            ->from('App:Auction', 'u')
//            ->join('App:UserBids', 'e')
//            ->where('e.bidItem = :value')
////            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
////            ->orderBy('', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }



//    public function findOneBySomeField($item): ?UserBids
//    {
//        return $this->createQueryBuilder('userBids')
//            ->andWhere('userBids.bidItem = :item')
//            ->orderBy('userBids.currentbid', 'ASC')
//            ->setParameter('item', $item)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

}
