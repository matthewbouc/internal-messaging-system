<?php

namespace App\Controller;

use App\Repository\GroupRepository;
use App\Repository\MessageRepository;
use App\Repository\UserGroupRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupsController extends AbstractController
{
    #[Route('/api/groups', methods: ['POST'])]
    public function createNewGroup(): Response
    {
        return $this->json('');
    }

    #[Route('/api/groups', methods: ['GET'])]
    public function returnAllGroups(): Response
    {
        return $this->json('');
    }

    #[Route('/api/groups', methods: ['PATCH', 'PUT'])]
    public function editAllGroups(): Response
    {
        return new JsonResponse('');
    }

// Refactor this elsewhere.
    #[Route('/api/groups/{userGroupId}', methods: ['DELETE'])]
    public function deleteUserFromGroup(string $userGroupId, MessageRepository $messageRepository, UserGroupRepository $userGroupRepository, ManagerRegistry $doctrine): Response
    {
        $groupToRemove = $userGroupRepository->find($userGroupId);

        $doctrine->getManager()->remove($groupToRemove);
        $doctrine->getManager()->flush();

        $response = new Response();
        return $response->setStatusCode(RESPONSE::HTTP_ACCEPTED);
    }

}
