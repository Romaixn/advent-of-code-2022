<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class InputFetcher
{
    public function __construct(
        private readonly CacheInterface $cache,
        private readonly HttpClientInterface $client,
        private readonly string $cookie
    ) {
    }

    public function fetch(int $day, int $year = 2022): string
    {
        return $this->cache->get('input_'.$day, function () use ($day, $year) {
            $response = $this->client->request('GET', "https://adventofcode.com/{$year}/day/{$day}/input", [
                'headers' => [
                    'cookie' => 'session='.$this->cookie,
                ],
            ]);

            return $response->getContent();
        });
    }
}
