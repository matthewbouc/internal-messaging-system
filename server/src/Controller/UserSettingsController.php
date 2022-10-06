<?php

namespace App\Controller;

use App\Repository\UserSettingRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserSettingsController extends AbstractController
{


//    #[Route('/api/teamChatGroupMessage/{userId}')]
//    public function returnGroupMessages(string $userId): Response {
//
//        return $this->getTeamChatGroupMessages($userId);
//    }

    #[Route('/api/userSettings', methods: ['GET'])]
    public function returnUserSettings(UserSettingRepository $userSettingRepository): Response
    {
        $settings = $userSettingRepository->find(1);
        $primary = $settings->getThemePrimaryColor();
        $secondary = $settings->getThemeSecondaryColor();

        return new JsonResponse([
            'color1' => $primary,
            'color2' => $secondary,
        ]);
    }

    #[Route('/api/userSettings', methods: ['POST'])]
    public function updateUserSettings(Request $request, UserSettingRepository $userSettingRepository, ManagerRegistry $doctrine): void
    {
        $newTheme = json_decode($request->getContent(), true);

        $settings = $userSettingRepository->find(1);
        $settings->setThemePrimaryColor($newTheme['color1']);
        $settings->setThemeSecondaryColor($newTheme['color2']);
        $doctrine->getManager()->flush();
    }

}