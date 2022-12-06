<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DayFiveControllerTest extends WebTestCase
{
    public function testControllerIsOk(): void
    {
        $client = static::createClient();
        $client->request('GET', '/day/5');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('p.part-one', 'Result: RTGWZTHLD.');
//        self::assertSelectorTextContains('p.part-two', 'Result: 874.');
    }
}
