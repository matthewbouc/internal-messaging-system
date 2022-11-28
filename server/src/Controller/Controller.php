<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Psr\Log\InvalidArgumentException;

class Controller extends AbstractController
{

    public function __construct(
        protected CacheInterface $cache
    ){}

//    Adjust this route to use the "old" way similar to backpack.  getItem, isHit, etc.
//    #[Route('/')]
//    public function returnText(CacheInterface $cache): Response {
//        $cacheItem = $cache->getItem('verification.attempt');
//        if (!$cacheItem->isHit()) {
//            $cacheItem->expiresAfter(60);
//            $cache->save($cacheItem);
//            echo( 'Unknown visitor<br>' );
//        } else {
//            echo( 'Known visitor<br>' );
//        }
//        return $this->json(['success' => true]);
//    }

//  Cache Contract method.  Uses a callback to set the item if it's not found in the get. Very generic cacheInterface -> easily switch between different caching tools.  Lose functionality that is specific to a tool

    /**
     * @throws \Psr\Cache\InvalidArgumentException
     */
    #[Route('/')]
    public function returnText(): Response {
        $cacheItem = 'Welcome';
        echo("$cacheItem <br>");
        $cacheItem = $this->cache->get('cache.attempt', function(ItemInterface $item) {
            $item->expiresAfter(10);
            echo("Item not in cache <br>");
            return('Item Now In Cache');
        });

        return $this->json([$cacheItem, 'always return']);
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