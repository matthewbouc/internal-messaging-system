<?php

namespace App\Service;

use App\Entity\Group;
use App\Entity\Message;
use App\Entity\UserGroup;
use App\Repository\GroupRepository;
use App\Repository\MessageRepository;
use App\Repository\UserGroupRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Monolog\DateTimeImmutable;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;


class GroupMessageService
{

    private UserGroupRepository $userGroupRepository;
    private LoggerInterface $logger;
    private MessageRepository $messageRepository;
    private GroupRepository $groupRepository;
    private UserRepository $userRepository;
    private ManagerRegistry $doctrine;

    function __construct(
    UserGroupRepository $userGroupRepository,
    LoggerInterface $logger,
    MessageRepository $messageRepository,
    GroupRepository $groupRepository,
    UserRepository $userRepository,
    ManagerRegistry $doctrine,
    )
    {
        $this->userGroupRepository = $userGroupRepository;
        $this->logger = $logger;
        $this->messageRepository = $messageRepository;
        $this->groupRepository = $groupRepository;
        $this->userRepository = $userRepository;
        $this->doctrine = $doctrine;
    }
    public function getAllMessagesForUser( $userId ): array
    {
        // Use userId to get UG_id, which then gets GroupID, which gets Messages
//        $userGroupIds = $this->userGroup->getId();
        $groupIds = [];
        $extractedMessages = [];

        $userGroupIds = $this->userGroupRepository->findBy(['user'=>$userId]);
        foreach ($userGroupIds as $userGroupId){
//            $groupIds[] = $userGroupId->getGroup()->getId();
            $groupId = $userGroupId->getGroup()->getId();
            $groupMessages = $this->messageRepository->findBy(['group'=>$groupId], ['created_at'=>'DESC'], 10);
            foreach ($groupMessages as $groupMessage){
                $extractedMessages[] =  [
                    'groupId'=>$groupId,
                    'message'=>$groupMessage->getMessage(),
                    'createdAt'=>$groupMessage->getCreatedAt(),
                    'status'=>$groupMessage->getMessageStatus(),
                    'messageId'=>$groupMessage->getId(),
                ];
            }
        }

        return $extractedMessages;
    }

    function getGroupMessages( $groupId ): array
    {
        $groupMessages = $this->messageRepository->findBy(['group' => $groupId], ['created_at' => 'DESC'], 10);
        $extractedMessages = [];
        foreach ($groupMessages as $groupMessage) {
            $extractedMessages[] = [
                'message' => $groupMessage->getMessage(),
                'createdAt' => $groupMessage->getCreatedAt(),
                'status' => $groupMessage->getMessageStatus(),
                'messageId' => $groupMessage->getId(),
                'author' => $groupMessage->getUser()->getId(),
            ];
        }
        return $extractedMessages;
    }


    function postNewMessage ($receivedMessage): void
    {
        $newMessage = new Message();
        $messageGroup = $this->groupRepository->findOneBy(["id"=>$receivedMessage['groupId']]);
        $messageAuthor = $this->userRepository->findOneBy(['id'=>$receivedMessage['author']]);

        $newMessage->setGroup($messageGroup);
        $newMessage->setMessage($receivedMessage['message']);
        $newMessage->setUser($messageAuthor);
        $newMessage->setMessageStatus('active');
        $date = new DateTimeImmutable('now');
        $newMessage->setUpdatedBy($messageAuthor);
        $newMessage->setCreatedAt($date);
        $newMessage->setUpdatedAt($date);

        $this->doctrine->getManager()->persist($newMessage);
        $this->doctrine->getManager()->flush();

    }

}