<?php

declare(strict_types=1);

namespace App\Puzzle;

final class DayOne
{
    public function __construct(private readonly string $input)
    {
    }

    public function partOne(): int
    {
        return (int) max($this->getCaloriesByElves());
    }

    /**
     * @return array<int, int>
     */
    private function getCaloriesByElves(): array
    {
        $elves = [];
        $currentElfCalories = 0;
        /** @var array<string> $file */
        $file = file($this->input);

        foreach ($file as $line) {
            $line = trim($line);

            if (empty($line)) {
                $elves[] = $currentElfCalories;
                $currentElfCalories = 0;
            } else {
                $currentElfCalories += (int) $line;
            }
        }

        return $elves;
    }

    public function partTwo(): int
    {
        $elves = $this->getCaloriesByElves();

        arsort($elves);

        $maxCalories = 0;
        for ($i = 0; $i < 3; ++$i) {
            $maxCalories += array_shift($elves);
        }

        return $maxCalories;
    }
}
