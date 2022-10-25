<?php

namespace App\Service;

use App\Repository\MetaRepository;

class MetaMessageService extends MessageService
{
    private MetaRepository $metaRepository;

    function __construct(
        MetaRepository $metaRepository,
    ){
        $this->metaRepository = $metaRepository;
    }

    function getMetaMessage($message): array
    {
        $returnMessage = $this->getMessage($message);

        $userMetaData = $this->metaRepository->findOneBy(['user' => $message->getUser()->getId()]);
        $returnMessage['authorFirstName'] =  $userMetaData->getFirstName();
        $returnMessage['authorLastName'] = $userMetaData->getLastName();

        return $returnMessage;
    }
}