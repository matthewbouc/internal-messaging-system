<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GroupMessageController extends AbstractController
{

    private string $primaryColor = '#fff';
    private string $secondaryColor = '#fff';

//    #[Route('/api/teamChatGroupMessage/{userId}')]
//    public function returnGroupMessages(string $userId): Response {
//
//        return $this->getTeamChatGroupMessages($userId);
//    }

    #[Route('/api/userSettings', methods: ['GET'])]
    public function returnUserSettings(): Response {
        return new JsonResponse([
            'color1' => $this->primaryColor,
            'color2' => $this->secondaryColor,
        ]);
    }

    #[Route('/api/userSettings', methods: ['POST'])]
    public function updateUserSettings(Request $request): Response {
        $newTheme = json_decode($request->getContent(), true);

        $this->primaryColor = $newTheme['color1'];
        $this->secondaryColor = $newTheme['color2'];

        return $this->returnUserSettings();
    }


    #[Route('/health')]
    public function health(): Response {
        return new Response();
    }

    #[Route('/log/{name}')]
    public function log(string $name, LoggerInterface $logger): Response {
        // See these in /var/log/ of your project root
        $logger->info("Hello, $name");
        return $this->json([
            'success' => true,
            'name' => $name
        ]);
    }
}