<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserSettingsController extends AbstractController
{

    private string $primaryColor = "#ACC8AB";
    private string $secondaryColor = "#4B6F44";

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

}