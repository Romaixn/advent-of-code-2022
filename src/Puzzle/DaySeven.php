<?php

declare(strict_types=1);

namespace App\Puzzle;

use App\Service\InputFetcher;

final class DaySeven
{
    public function __construct(private readonly InputFetcher $inputFetcher)
    {
    }

    public function partOne(): int
    {
        $input = $this->inputFetcher->fetch(6);

        dump($input);

        return 0;
    }

    public function partTwo(): int
    {
        return 0;
    }
}