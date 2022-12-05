<?php

declare(strict_types=1);

namespace App\Controller;

use App\Puzzle\DayFive;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DayFiveController extends AbstractController
{
    #[Route('/day/5', name: 'day_five')]
    public function index(DayFive $dayFive): Response
    {
        return $this->render('puzzle/day_five.html.twig', [
            'part_one' => $dayFive->partOne(),
            'part_two' => $dayFive->partTwo(),
        ]);
    }
}
