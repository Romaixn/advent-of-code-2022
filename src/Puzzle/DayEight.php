<?php

declare(strict_types=1);

namespace App\Puzzle;

use App\Service\InputFetcher;

final class DayEight
{
    public function __construct(private readonly InputFetcher $inputFetcher)
    {
    }

    public function partOne(): int
    {
        $treeMap = $this->inputFetcher->fetch(8);
        $treeMap = "30373\n25512\n65332\n33549\n35390";
        $treeMap = explode(PHP_EOL, $treeMap);

        $matrix = [];
        $i = 0;
        foreach ($treeMap as $treeLine) {
            $treeLine = str_split($treeLine);
            $matrix[$i] = $treeLine;

            ++$i;
        }

        dump($matrix);

        return 0;
    }

    public function partTwo(): int
    {
        return 0;
    }
}
