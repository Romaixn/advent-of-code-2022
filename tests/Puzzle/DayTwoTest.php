<?php

declare(strict_types=1);

namespace App\Tests\Puzzle;

use App\Puzzle\DayTwo;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DayTwoTest extends KernelTestCase
{
    public function testPartOne(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayOne = $container->get(DayTwo::class);

        $this->assertEquals(15422, $dayOne->partOne());
    }

    public function testPartTwo(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayOne = $container->get(DayTwo::class);

        $this->assertEquals(15442, $dayOne->partTwo());
    }
}
