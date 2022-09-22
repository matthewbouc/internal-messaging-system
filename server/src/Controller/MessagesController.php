<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessagesController extends AbstractController
{
    #[Route('/api/messages', methods: ['POST'])]
    public function createNewMessage(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/messages', methods: ['GET'])]
    public function returnAllMessages(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/messages', methods: ['PATCH', 'PUT'])]
    public function editAllMessages(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/messages', methods: ['DELETE'])]
    public function deleteAllMessages(): Response
    {
        return new JsonResponse('');
    }

}
