<?php

declare(strict_types=1);

namespace App\Tests\Puzzle;

use App\Puzzle\DayOne;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DayOneTest extends KernelTestCase
{
    public function testPartOne(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayOne = $container->get(DayOne::class);

        $this->assertEquals(71023, $dayOne->partOne());
    }

    public function testPartTwo(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayOne = $container->get(DayOne::class);

        $this->assertEquals(206289, $dayOne->partTwo());
    }
}
