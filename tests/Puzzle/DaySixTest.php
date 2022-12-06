<?php

declare(strict_types=1);

namespace App\Tests\Puzzle;

use App\Puzzle\DaySix;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DaySixTest extends KernelTestCase
{
    public function testPartOne(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $daySix = $container->get(DaySix::class);

        $this->assertEquals(1109, $daySix->partOne());
    }

    public function testPartTwo(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $daySix = $container->get(DaySix::class);

        $this->assertEquals(3965, $daySix->partTwo());
    }
}
