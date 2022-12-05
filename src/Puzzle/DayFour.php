<?php

declare(strict_types=1);

namespace App\Puzzle;

use App\Service\FileToArray;

final class DayFour
{
    public function __construct(private readonly FileToArray $fileToArray, private readonly string $input)
    {
    }

    public function partOne(): int
    {
        $pairs = $this->fileToArray->convertFileToArray($this->input);
        $assignments = [];
        $numberPairsWithSameAssignment = 0;

        foreach ($pairs as $pair) {
            $pair = explode(',', $pair);
            $group1 = explode('-', $pair[0]);
            $group2 = explode('-', $pair[1]);
            $group1 = range($group1[0], $group1[1]);
            $group2 = range($group2[0], $group2[1]);

            $sameAssignments = array_intersect($group1, $group2);

            if ($sameAssignments === $group1 || $sameAssignments === $group2) {
                ++$numberPairsWithSameAssignment;
            } else {
                $sameAssignments = array_intersect($group2, $group1);

                if ($sameAssignments === $group1 || $sameAssignments === $group2) {
                    ++$numberPairsWithSameAssignment;
                }
            }
        }

        return $numberPairsWithSameAssignment;
    }

    public function partTwo(): int
    {
        return 0;
    }
}
