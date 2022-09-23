<?php

namespace App\Controller;

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


}