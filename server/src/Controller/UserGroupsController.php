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

class UserGroupsController extends AbstractController
{

    #[Route('/api/userGroups/{slug}', methods: ['GET'])]
    public function returnNotifications(): Response {
        return new JsonResponse('notifications');
    }

    #[Route('/api/userGroupsMessages/{slug}', methods: ['GET'])]
    public function getAllGroupsMessages(UserGroupRepository $userGroupRepository, MessageRepository $messageRepository, string $slug): Response
    {
        $allGroups = $userGroupRepository->findBy(array('user'=>$slug));
        var_export($allGroups);
        $allMessages = [];
        foreach ($allGroups as $group) {
            $currentGroup = $group->getId();
//            var_dump($currentGroup);
            $groupMessages = $messageRepository->findBy(array('group'=>$currentGroup));
            $allMessages[] = [$currentGroup => $groupMessages];
        }

        return new JsonResponse($allMessages);
    }

}