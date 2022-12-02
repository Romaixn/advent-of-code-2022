<?php

declare(strict_types=1);

namespace App\Controller;

use App\Puzzle\DayTwo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DayTwoController extends AbstractController
{
    #[Route('/day/2', name: 'day_two')]
    public function index(DayTwo $dayTwo): Response
    {
        return $this->render('puzzle/day_two.html.twig', [
            'part_one' => $dayTwo->partOne(),
            'part_two' => $dayTwo->partTwo(),
        ]);
    }
}
