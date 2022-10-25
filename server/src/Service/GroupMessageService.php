<?php

namespace App\Service;

use App\Entity\Message;
use App\Repository\GroupRepository;
use App\Repository\MessageRepository;
use App\Repository\MetaRepository;
use App\Repository\UserRepository;
use Monolog\DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;



class GroupMessageService extends MetaMessageService
{

    private MessageRepository $messageRepository;
    private GroupRepository $groupRepository;
    private UserRepository $userRepository;
    private ManagerRegistry $managerRegistry;
    private MetaRepository $metaRepository;

    function __construct(
        MessageRepository $messageRepository,
        GroupRepository $groupRepository,
        UserRepository $userRepository,
        ManagerRegistry $managerRegistry,
        MetaRepository $metaRepository,
    ){
        parent::__construct($metaRepository);
        $this->messageRepository = $messageRepository;
        $this->groupRepository = $groupRepository;
        $this->userRepository = $userRepository;
        $this->managerRegistry = $managerRegistry;
    }

    function getGroupMessages( $groupId ): array
    {
        $groupMessages = $this->messageRepository->findBy(['group' => $groupId], ['created_at' => 'DESC'], 5);
        $extractedMessages = [];
        foreach ($groupMessages as $groupMessage) {
            $extractedMessages[] = $this->getMetaMessage($groupMessage);
        }
        usort($extractedMessages, fn($a, $b) => $a['createdAt'] <=> $b['createdAt']);
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
        $newMessage->setUpdatedBy($messageAuthor);
        $date = new DateTimeImmutable('now');
        $newMessage->setCreatedAt($date);
        $newMessage->setUpdatedAt($date);

        $this->managerRegistry->getManager()->persist($newMessage);
        $this->managerRegistry->getManager()->flush();
    }
}