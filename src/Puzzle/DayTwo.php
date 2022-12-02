<?php

declare(strict_types=1);

namespace App\Puzzle;

final class DayTwo
{
    public const ROCK_PLAY = 'A';
    public const PAPER_PLAY = 'B';
    public const SCISSORS_PLAY = 'C';

    public const ROCK_TO_PLAY = 'X';
    public const PAPER_TO_PLAY = 'Y';
    public const SCISSORS_TO_PLAY = 'Z';

    public const MOVE_POINTS = [
        self::ROCK_TO_PLAY => 1,
        self::PAPER_TO_PLAY => 2,
        self::SCISSORS_TO_PLAY => 3,
    ];

    public const MOVE_WIN = [
        self::ROCK_TO_PLAY => 'lose',
        self::PAPER_TO_PLAY => 'draw',
        self::SCISSORS_TO_PLAY => 'win',
    ];

    public const WIN = [
        self::ROCK_PLAY => self::PAPER_TO_PLAY,
        self::PAPER_PLAY => self::SCISSORS_TO_PLAY,
        self::SCISSORS_PLAY => self::ROCK_TO_PLAY,
    ];

    public const DRAW = [
        self::ROCK_PLAY => self::ROCK_TO_PLAY,
        self::PAPER_PLAY => self::PAPER_TO_PLAY,
        self::SCISSORS_PLAY => self::SCISSORS_TO_PLAY,
    ];

    public const LOSE = [
        self::ROCK_PLAY => self::SCISSORS_TO_PLAY,
        self::PAPER_PLAY => self::ROCK_TO_PLAY,
        self::SCISSORS_PLAY => self::PAPER_TO_PLAY,
    ];

    public function __construct(private readonly string $input)
    {
    }

    public function partOne(): int
    {
        $strategyGuide = $this->getStrategyGuideHasArray();
        $points = 0;

        foreach ($strategyGuide as $strategy) {
            $points += $this->getPointsFollowFirstStrategy($strategy);
        }

        return $points;
    }

    public function partTwo(): int
    {
        $strategyGuide = $this->getStrategyGuideHasArray();
        $points = 0;

        foreach ($strategyGuide as $strategy) {
            $points += $this->getPointsFollowRealStrategy($strategy);
        }

        return $points;
    }

    /**
     * @param array<string, string> $strategy
     */
    private function getPointsFollowRealStrategy(array $strategy): int
    {
        $points = 0;

        if (self::MOVE_WIN[$strategy['to_play']] === 'win') {
            $move = self::WIN[$strategy['play']];
            $points += self::MOVE_POINTS[$move] + 6;
        } elseif (self::MOVE_WIN[$strategy['to_play']] === 'draw') {
            $move = self::DRAW[$strategy['play']];
            $points += self::MOVE_POINTS[$move] + 3;
        } elseif (self::MOVE_WIN[$strategy['to_play']] === 'lose') {
            $move = self::LOSE[$strategy['play']];
            $points += self::MOVE_POINTS[$move] + 0;
        }

        return $points;
    }

    /**
     * @param array<string, string> $strategy
     */
    private function getPointsFollowFirstStrategy(array $strategy): int
    {
        $points = 0;

        $points += self::MOVE_POINTS[$strategy['to_play']];

        if (self::WIN[$strategy['play']] === $strategy['to_play']) {
            $points += 6;
        } elseif (self::DRAW[$strategy['play']] === $strategy['to_play']) {
            $points += 3;
        } elseif (self::LOSE[$strategy['play']] === $strategy['to_play']) {
            $points += 0;
        }

        return $points;
    }

    /**
     * @return array<array<string, string>>
     */
    private function getStrategyGuideHasArray(): array
    {
        /** @var string $fileContent */
        $fileContent = file_get_contents($this->input);
        $arrayLines = explode("\n", $fileContent);
        $strategyGuide = [];

        foreach ($arrayLines as $line) {
            $line = explode(' ', $line);

            $strategyGuide[] = [
                'play' => $line[0],
                'to_play' => rtrim($line[1]),
            ];
        }

        return $strategyGuide;
    }
}
