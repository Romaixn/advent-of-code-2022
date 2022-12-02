<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DayTwoControllerTest extends WebTestCase
{
    public function testControllerIsOk(): void
    {
        $client = static::createClient();
        $client->request('GET', '/day/2');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('p:first-of-type', 'Result: 15,422 points.');
        self::assertSelectorTextContains('p:last-of-type', 'Result: 15,442 points.');
    }
}
