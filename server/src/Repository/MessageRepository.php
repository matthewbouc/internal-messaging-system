<?php

namespace App\Repository;

use App\Entity\Group;
use App\Entity\Message;
use App\Entity\User;
use App\Entity\UserGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Message>
 *
 * @method Message|null find($id, $lockMode = null, $lockVersion = null)
 * @method Message|null findOneBy(array $criteria, array $orderBy = null)
 * @method Message[]    findAll()
 * @method Message[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function add(Message $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Message $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Message[] Returns an array of Message objects
//     */
    public function getAllMessagesForUser($userId): array
    {
        /**
         * This is skirting the point of Repository.  Service logic should be doing all the dirty
         * work.  We want to pull all groups with a service call, then loop through and pull all
         * messages.  Then collect all necessary information, bundle into a cool DTO and ship that
         * baddie off.
         */


//        $returnBody = [];
//
//        $allGroups = $this->getEntityManager()->createQueryBuilder()
//                        ->select('ug','g')
//                        ->from(UserGroup::class, 'ug')
//                        ->join(Group::class, 'g', 'WITH', 'g.id = ug.group')
//                        ->where('ug.user = :userId')
//                        ->setParameter('userId', $userId)
//                        ->getQuery()
//                        ->getScalarResult();
//        return $allGroups;
//
//        foreach ($allGroups as $id => $value){
//            $groupMessages = $this->getEntityManager()->createQueryBuilder()
//                                ->select('m')
//                                ->from(Message::class, 'm')
//                                ->where('m.group = :singleGroup')
//                                ->setParameter('singleGroup', $value)
//                                ->getQuery()
//                                ->getScalarResult();
//
//            $returnBody[] = [ 'id' => $value, 'messages' => $groupMessages];
//        }
//
//        return $returnBody;

//        return $this->getEntityManager()->createQueryBuilder()
//            ->select('g', 'ug', 'm')
//            ->from(Message::class, 'm')
//            ->join(Group::class, 'g', 'WITH', 'g.id = m.group')
//            ->join(UserGroup::class, 'ug', 'WITH', 'g.id = ug.group')
//            ->where('ug.user = :userId')
//            ->setParameter('userId', $userId)
//            ->getQuery()
//            ->getScalarResult()
//        ;
    }


//    public function findOneBySomeField($value): ?Message
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
