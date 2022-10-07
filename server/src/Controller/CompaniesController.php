<?php

namespace App\Controller;

use App\Repository\CompanyRepository;
use PHPUnit\Util\Json;
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
    public function returnAllCompanies(CompanyRepository $companyRepository): Response
    {
        $companiesAll = $companyRepository->findAll();
        $coArray = [];
        foreach($companiesAll as $company) {
            $coArray[] = [$company->getId() => $company->getName()];
        }

        return new JsonResponse($coArray);
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
