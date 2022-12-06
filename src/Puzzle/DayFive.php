<?php

declare(strict_types=1);

namespace App\Puzzle;

use App\Service\InputFetcher;

final class DayFive
{
    public function __construct(private readonly InputFetcher $inputFetcher)
    {
    }

    public function partOne(): string
    {
        $input = $this->inputFetcher->fetch(5);
        $startingStacks = $this->getStartingStacksFromInput($input);
        $startingStacks = $this->transformStartingStacksToArray($startingStacks);

        $instructions = $this->getInstructionsFromInput($input);

        foreach ($instructions as $instruction) {
            // $actions[0] = total to move, $actions[1] = from, $actions[2] = to
            $actions = [];
            preg_match_all('!\d+!', $instruction, $actions);

            for ($i = 0; $i < $actions[0][0]; ++$i) {
                array_unshift($startingStacks[$actions[0][2] - 1], array_shift($startingStacks[$actions[0][1] - 1]));
            }
        }

        $topStacks = $this->getTopOfStack($startingStacks);

        return implode('', $topStacks);
    }

    public function partTwo(): int
    {
        return 0;
    }

    /**
     * @return array<int, string>
     */
    private function getStartingStacksFromInput(string $input): array
    {
        $stacks = explode(PHP_EOL, $input);
        $startingStacks = [];

        foreach ($stacks as $stack) {
            if ($stack === '') {
                break;
            }

            $startingStacks[] = $stack;
        }

        array_pop($startingStacks);

        return $startingStacks;
    }

    /**
     * @param array<int, string> $startingStacks
     *
     * @return array<int, array<int, string>>
     */
    private function transformStartingStacksToArray(array $startingStacks): array
    {
        $stacks = [];

        foreach ($startingStacks as $stack) {
            $stack = str_split($stack);
            $stack = array_chunk($stack, 4);

            $stack = array_map(static function ($item) {
                $item = \count($item) === 4 ? \array_slice($item, 0, -1) : $item;

                return $item[1];
            }, $stack);

            $stackLength = \count($stack);
            for ($i = 0; $i < $stackLength; ++$i) {
                $stacks[$i][] = $stack[$i];
            }
        }

        foreach ($stacks as &$stack) {
            $stack = array_filter($stack, static fn ($item) => $item !== ' ');
        }

        return $stacks;
    }

    /**
     * @return array<int, string>
     */
    private function getInstructionsFromInput(string $input): array
    {
        $stacks = explode(PHP_EOL, $input);
        $instructions = [];

        $instructionsHere = false;
        foreach ($stacks as $stack) {
            if ($instructionsHere) {
                if ($stack !== '') {
                    $instructions[] = $stack;
                }
            } elseif ($stack === '') {
                $instructionsHere = true;
            }
        }

        return $instructions;
    }

    /**
     * @param array<int, array<int, string>> $stack
     *
     * @return array<int, string>
     */
    private function getTopOfStack(array $stack): array
    {
        $top = [];

        foreach ($stack as $item) {
            $top[] = array_shift($item);
        }

        return $top;
    }
}
