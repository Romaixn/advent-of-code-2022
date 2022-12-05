<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DayFourControllerTest extends WebTestCase
{
    public function testControllerIsOk(): void
    {
        $client = static::createClient();
        $client->request('GET', '/day/4');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('p.part-one', 'Result: 483.');
        self::assertSelectorTextContains('p.part-two', 'Result: 874.');
    }
}
