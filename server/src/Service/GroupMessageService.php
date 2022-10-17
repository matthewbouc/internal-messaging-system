<?php

namespace App\Service;

use App\Entity\UserGroup;
use App\Repository\MessageRepository;
use App\Repository\UserGroupRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class GroupMessageService
{

    private UserGroupRepository $userGroupRepository;
    private LoggerInterface $logger;
    private MessageRepository $messageRepository;

    function __construct(
    UserGroupRepository $userGroupRepository,
    LoggerInterface $logger,
    MessageRepository $messageRepository,
    )
    {
        $this->userGroupRepository = $userGroupRepository;
        $this->logger = $logger;
        $this->messageRepository = $messageRepository;
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
            ];
        }
        return $extractedMessages;
    }
}