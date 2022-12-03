<?php

declare(strict_types=1);

namespace App\Puzzle;

final class DayThree
{
    public function __construct(private readonly string $input)
    {
    }

    public function partOne(): int
    {
        $rucksacks = $this->getRucksacksAsArray();
        $prioritiesOfItems = 0;

        foreach ($rucksacks as $rucksack) {
            $prioritiesOfItems += ctype_upper($rucksack['common_characters']) ? \ord(strtoupper($rucksack['common_characters'])) - \ord('A') + 27 : \ord(strtoupper($rucksack['common_characters'])) - \ord('A') + 1;
        }

        return $prioritiesOfItems;
    }

    /**
     * @return array<array<string, string>>
     */
    private function getRucksacksAsArray(): array
    {
        $rucksacks = [];
        /** @var array<string> $file */
        $file = file($this->input);

        foreach ($file as $line) {
            $line = trim($line);
            $demiLength = (int) (\strlen($line) / 2);
            $firstCompartment = substr($line, 0, $demiLength);
            $secondCompartment = substr($line, $demiLength, \strlen($line));
            // Get characters in common between the two compartments
            $commonCharacters = array_intersect(str_split($firstCompartment), str_split($secondCompartment));

            $rucksacks[] = [
                'first_compartment' => $firstCompartment,
                'second_compartment' => $secondCompartment,
                'common_characters' => implode('', array_unique($commonCharacters)),
            ];
        }

        return $rucksacks;
    }

    public function partTwo(): int
    {
        return 0;
    }
}
