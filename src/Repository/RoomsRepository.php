<?php

namespace App\Repository;

use App\Entity\Rooms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rooms>
 *
 * @method Rooms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rooms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rooms[]    findAll()
 * @method Rooms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rooms::class);
    }

    public function add(Rooms $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Rooms $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // public function findByMonth(\DateTime $date) {
    //     $queryBuilder = $this->createQueryBuilder('a');
    //         $queryBuilder->select('a');
    //         $queryBuilder->where('a.stayDate = :date');
    //         $queryBuilder->setParameter('date', $date->format('Y-m-d'));

    //     return $queryBuilder->getQuery()->getResult();
    // }

    public function findByMonth($month) {

        $startDate = new \DateTimeImmutable("2022-$month-01T00:00:00");
        $endDate = $startDate->modify('last day of this month');

        $queryBuilder = $this->createQueryBuilder('object');
            $queryBuilder->select('object');
            $queryBuilder->where('object.stayDate BETWEEN :start AND :end');
            $queryBuilder->setParameter('start', $startDate->format('Y-m-d H:i:s'));
            $queryBuilder->setParameter('end', $endDate->format('Y-m-d H:i:s'));

        return $queryBuilder->getQuery()->getResult();
    }

//    /**
//     * @return Rooms[] Returns an array of Rooms objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Rooms
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
