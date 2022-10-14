<?php

namespace App\Controller;

use App\Repository\GroupRepository;
use App\Repository\MessageRepository;
use App\Repository\UserGroupRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GroupMessageService;

class UserGroupMessagesController extends AbstractController
{
//    private GroupMessageService $groupMessageService;

    #[Route('/api/userGroupsMessages/{userId}', methods: ['GET'])]
    public function getUsersGroupMessages(GroupMessageService $groupMessageService, string $userId): Response
    {
        $allMessages = $groupMessageService->getAllMessagesForUser($userId);
        return $this->json($allMessages);
    }

}