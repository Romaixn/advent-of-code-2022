<?php

declare(strict_types=1);

namespace App\Tests\Puzzle;

use App\Puzzle\DayFour;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DayFourTest extends KernelTestCase
{
    public function testPartOne(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayFour = $container->get(DayFour::class);

        $this->assertEquals(483, $dayFour->partOne());
    }

    public function testPartTwo(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayFour = $container->get(DayFour::class);

        $this->assertEquals(874, $dayFour->partTwo());
    }
}
