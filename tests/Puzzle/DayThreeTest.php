<?php

declare(strict_types=1);

namespace App\Tests\Puzzle;

use App\Puzzle\DayThree;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DayThreeTest extends KernelTestCase
{
    public function testPartOne(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayThree = $container->get(DayThree::class);

        $this->assertEquals(8088, $dayThree->partOne());
    }

    public function testPartTwo(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $dayThree = $container->get(DayThree::class);

        $this->assertEquals(2522, $dayThree->partTwo());
    }
}
