<?php

declare(strict_types=1);

namespace App\Controller;

use App\Puzzle\DayFour;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DayFourController extends AbstractController
{
    #[Route('/day/4', name: 'day_four')]
    public function index(DayFour $dayFour): Response
    {
        return $this->render('puzzle/day_four.html.twig', [
            'part_one' => $dayFour->partOne(),
            'part_two' => $dayFour->partTwo(),
        ]);
    }
}
