<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DayOneControllerTest extends WebTestCase
{
    public function testControllerIsOk(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/day/1');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('p:first-of-type', 'Result: 71,023 Calories');
        self::assertSelectorTextContains('p:last-of-type', 'Result: 206,289 Calories');
    }
}
