<?php

namespace App\Repository;

use App\Entity\CountryOfOrigin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CountryOfOrigin>
 *
 * @method CountryOfOrigin|null find($id, $lockMode = null, $lockVersion = null)
 * @method CountryOfOrigin|null findOneBy(array $criteria, array $orderBy = null)
 * @method CountryOfOrigin[]    findAll()
 * @method CountryOfOrigin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountryOfOriginRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CountryOfOrigin::class);
    }

    public function add(CountryOfOrigin $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CountryOfOrigin $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CountryOfOrigin[] Returns an array of CountryOfOrigin objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CountryOfOrigin
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
