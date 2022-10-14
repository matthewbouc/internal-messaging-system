<?php

namespace App\Controller;

use App\Repository\GroupRepository;
use App\Repository\MessageRepository;
use App\Repository\UserGroupRepository;
use App\Service\UserGroupService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserGroupsController extends AbstractController
{

    #[Route('/api/userGroups/{userId}', methods: ['GET'])]
    public function returnNotifications(UserGroupService $userGroupService, string $userId): Response {
        return $this->json($userGroupService->returnAllGroups($userId));
    }


}