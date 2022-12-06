<?php

declare(strict_types=1);

namespace App\Tests\Puzzle;

use App\Puzzle\DayFive;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DayFiveTest extends KernelTestCase
{
    public function testPartOne(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayFive = $container->get(DayFive::class);

        $this->assertEquals('RTGWZTHLD', $dayFive->partOne());
    }
}
