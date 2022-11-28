<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class RedisController extends AbstractController
{
    public function __construct(
        protected CacheInterface $cache
    ){}

    #[Route('/redis')]
    public function returnCache(): Response {
        echo("Welcome <br>");
        $cacheItem = $this->cache->get('cache.attempt', function(ItemInterface $item) {
            $item->expiresAfter(10);
            echo("Item not found in cache <br>");
            return('This is the cached item');
        });

        return $this->json([$cacheItem, 'Always Return This']);
    }
}