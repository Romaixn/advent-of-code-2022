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
     * @return array<array<string>>
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
            $commonCharacters = array_intersect(str_split($firstCompartment), str_split($secondCompartment));

            $rucksacks[] = [
                'first_compartment' => $firstCompartment,
                'second_compartment' => $secondCompartment,
                'common_characters' => implode('', array_unique($commonCharacters)),
            ];
        }

        return $rucksacks;
    }

    /**
     * @return array<array<string>>
     */
    private function getRucksacksGroupsAsArray(): array
    {
        $rucksacks = [];
        /** @var array<string> $file */
        $file = file($this->input);

        $i = 1;
        $j = 0;
        foreach ($file as $line) {
            $line = trim($line);

            $rucksacks[$j][] = $line;

            if ($i === 3) {
                $i = 0;
                ++$j;
            }
            ++$i;
        }

        return $rucksacks;
    }

    public function partTwo(): int
    {
        $rucksacks = $this->getRucksacksGroupsAsArray();
        $priorityOfItems = 0;

        foreach ($rucksacks as $rucksack) {
            /** @var array<string> $sameCharactersArray */
            $sameCharactersArray = array_intersect(str_split($rucksack[0]), str_split($rucksack[1]), str_split($rucksack[2]));
            /** @var string $sameCharacters */
            $sameCharacters = reset($sameCharactersArray);
            $priorityOfItems += ctype_upper($sameCharacters) ? \ord(strtoupper($sameCharacters)) - \ord('A') + 27 : \ord(strtoupper($sameCharacters)) - \ord('A') + 1;
        }

        return $priorityOfItems;
    }
}
