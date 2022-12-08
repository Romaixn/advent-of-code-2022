<?php

declare(strict_types=1);

namespace App\Controller;

use App\Puzzle\DayEight;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DayEightController extends AbstractController
{
    #[Route('/day/8', name: 'day_eight')]
    public function index(DayEight $dayEight): Response
    {
        return $this->render('puzzle/day_eight.html.twig', [
            'part_one' => $dayEight->partOne(),
            'part_two' => $dayEight->partTwo(),
        ]);
    }
}
