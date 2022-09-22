<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompaniesController extends AbstractController
{
    #[Route('/api/companies', methods: ['POST'])]
    public function createNewCompany(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/companies', methods: ['GET'])]
    public function returnAllCompanies(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/companies', methods: ['PATCH', 'PUT'])]
    public function editAllCompanies(): Response
    {
        return new JsonResponse('');
    }

    #[Route('/api/companies', methods: ['DELETE'])]
    public function deleteAllCompanies(): Response
    {
        return new JsonResponse('');
    }

}
