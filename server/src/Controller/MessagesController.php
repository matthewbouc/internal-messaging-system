<?php

namespace App\Controller;

use App\Service\GroupMessageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessagesController extends AbstractController
{
    #[Route('/api/messages', methods: ['POST'])]
    public function createNewMessage(Request $request, GroupMessageService $groupMessageService): Response
    {
        $receivedMessaged = json_decode($request->getContent(), true);
        $groupMessageService->postNewMessage($receivedMessaged);

        $response = new Response();
        return $response->setStatusCode(RESPONSE::HTTP_ACCEPTED);
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
