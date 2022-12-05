<?php

declare(strict_types=1);

namespace App\Puzzle;

use App\Service\InputFetcher;

final class DayFive
{
    public function __construct(private readonly InputFetcher $inputFetcher)
    {
    }

    public function partOne(): int
    {
        $input = $this->inputFetcher->fetch(5);
        $array = explode(PHP_EOL, $input);
        dump($array);

        return 0;
    }

    public function partTwo(): int
    {
        return 0;
    }
}
