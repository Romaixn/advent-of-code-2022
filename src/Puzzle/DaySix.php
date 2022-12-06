<?php

declare(strict_types=1);

namespace App\Puzzle;

use App\Service\InputFetcher;

final class DaySix
{
    public function __construct(private readonly InputFetcher $inputFetcher)
    {
    }

    public function partOne(): int
    {
        $input = $this->inputFetcher->fetch(6);

        $i = 0;
        $checkedChar = [];
        foreach (str_split($input) as $char) {
            $checkedChar[] = $char;
            ++$i;
            if ($this->hasDuplicate($checkedChar)) {
                $j = 0;
                $indexToCut = null;
                foreach ($checkedChar as $letter) {
                    ++$j;
                    if ($letter === $char) {
                        $indexToCut = $j;
                        break;
                    }
                }

                if ($indexToCut) {
                    $checkedChar = \array_slice($checkedChar, $indexToCut);
                }
            } elseif (\count($checkedChar) === 4) {
                break;
            }
        }

        return $i;
    }

    /**
     * @param array<int, string> $array
     */
    private function hasDuplicate(array $array): bool
    {
        return \count($array) !== \count(array_flip($array));
    }

    public function partTwo(): int
    {
        $input = $this->inputFetcher->fetch(6);

        $i = 0;
        $checkedChar = [];
        foreach (str_split($input) as $char) {
            $checkedChar[] = $char;
            ++$i;
            if ($this->hasDuplicate($checkedChar)) {
                $j = 0;
                $indexToCut = null;
                foreach ($checkedChar as $letter) {
                    ++$j;
                    if ($letter === $char) {
                        $indexToCut = $j;
                        break;
                    }
                }

                if ($indexToCut) {
                    $checkedChar = \array_slice($checkedChar, $indexToCut);
                }
            } elseif (\count($checkedChar) === 14) {
                break;
            }
        }

        return $i;
    }
}
