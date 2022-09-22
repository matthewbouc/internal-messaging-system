<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/api/users', methods: ['POST'])]
    public function createNewUser(): Response
    {
        return new JsonResponse('');
    }


    #[Route('/api/users', methods: ['GET'])]
    public function returnAllUsers(): Response
    {
        return new JsonResponse('');
    }


    #[Route('/api/users', methods: ['PATCH', 'PUT'])]
    public function editAllUsers(): Response
    {
        return new JsonResponse('');
    }


    #[Route('/api/users', methods: ['DELETE'])]
    public function deleteAllUsers(): Response
    {
        return new JsonResponse('');
    }
}