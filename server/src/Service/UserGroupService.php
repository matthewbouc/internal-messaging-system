<?php

namespace App\Service;

use App\Entity\UserGroup;
use App\Repository\MessageRepository;
use App\Repository\UserGroupRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserGroupService
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
    public function returnAllGroups( $userId ): array
    {
        // Use userId to get UG_id, which then gets GroupID, which gets Messages
//        $userGroupIds = $this->userGroup->getId();
        $returnUserGroups = [];
        $extractedMessages = [];

        $userGroups = $this->userGroupRepository->findBy(['user'=>$userId]);
        foreach($userGroups as $userGroup){
            $returnUserGroups[] = [
                'userGroupId'=>$userGroup->getId(),
                'groupId'=>$userGroup->getGroup()->getId(),
                'groupName'=>$userGroup->getGroup()->getGroupName(),
                'notifications'=>$userGroup->getNotifications(),
            ];
        }

        return $returnUserGroups;
    }
}