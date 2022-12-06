<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DaySixControllerTest extends WebTestCase
{
    public function testControllerIsOk(): void
    {
        $client = static::createClient();
        $client->request('GET', '/day/6');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('p.part-one', 'Result: 1,109.');
        self::assertSelectorTextContains('p.part-two', 'Result: 3,965.');
    }
}
