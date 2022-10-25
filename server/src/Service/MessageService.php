<?php

namespace App\Service;

use App\Repository\MetaRepository;

class MessageService
{
    function getMessage($message): array
    {
        return [
            'message' => $message->getMessage(),
            'createdAt' => $message->getCreatedAt(),
            'status' => $message->getMessageStatus(),
            'authorId' => $message->getUser()->getId(),
        ];
    }
}