<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupsController extends AbstractController
{
    #[Route('/api/groups', methods: ['POST'])]
    public function createNewGroup(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/groups', methods: ['GET'])]
    public function returnAllGroups(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/groups', methods: ['PATCH', 'PUT'])]
    public function editAllGroups(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/groups', methods: ['DELETE'])]
    public function deleteAllGroups(): Response
    {
        return new JsonResponse('');
    }

}
