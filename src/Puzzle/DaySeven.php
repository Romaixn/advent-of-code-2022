<?php

declare(strict_types=1);

namespace App\Puzzle;

use App\Service\InputFetcher;

// TODO: Finish this puzzle
final class DaySeven
{
    private array $tree = [];
    private array $path = [];

    public function __construct(private readonly InputFetcher $inputFetcher)
    {
    }

    public function partOne(): int
    {
        $input = $this->inputFetcher->fetch(7);

        $terminal = explode(PHP_EOL, $input);

        while ($output = current($terminal)) {
            // Command executed
            if (str_starts_with($output, '$ ')) {
                $outputArray = explode(' ', substr($output, 2));
                if (isset($outputArray[1])) {
                    [$cmd, $arg] = $outputArray;
                } else {
                    $cmd = $outputArray[0];
                    $arg = null;
                }

                switch ($cmd) {
                    case 'cd':
                        if ($arg !== null) {
                            $this->goto($arg);
                        }
                        break;
                    case 'ls':
                        $path = implode('', $this->path);

                        if (!\array_key_exists($path, $this->tree)) {
                            $this->tree[$path] = [];
                        }

                        while (true) {
                            if ('' === ($output = next($terminal))) {
                                break 2;
                            }
                            if (str_starts_with($output, '$ ')) {
                                break;
                            }
                            [$size, $name] = explode(' ', $output);

                            // Index files or directories, latter ending with /
                            $this->tree[$path][] = match ($size) {
                                'dir' => [
                                    'name' => $name.'/',
                                    'size' => null,
                                ],
                                default => [
                                    'name' => $name,
                                    'size' => $size,
                                ]
                            };
                        }

                        // Back up the pointer to process the next command
                        prev($terminal);
                        break;
                }
            }

            next($terminal);
        }

        dump($this->tree);

        return $this->getSizeOfDirectory($this->tree['/'], '/');
    }

    public function partTwo(): int
    {
        return 0;
    }

    private function goto(string $dir): void
    {
        if ($dir === '..') {
            array_pop($this->path);
        } elseif ($dir === '/') {
            $this->path = ['/'];
        } else {
            $this->path[] = $dir.'/';
        }
    }

    private function getSizeOfDirectory(array $tree, string $path): int
    {
        $size = 0;

        foreach ($tree as $file) {
            if ($file['size'] !== null) {
                $size += $file['size'];
            } else {
                $size += $this->getSizeOfDirectory($this->tree[$path.$file['name']], $path.$file['name']);
            }
        }

        return $size;
    }
}
