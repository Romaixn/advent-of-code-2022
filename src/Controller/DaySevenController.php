<?php

declare(strict_types=1);

namespace App\Controller;

use App\Puzzle\DaySeven;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DaySevenController extends AbstractController
{
    #[Route('/day/7', name: 'day_seven')]
    public function index(DaySeven $daySeven): Response
    {
        return $this->render('puzzle/day_seven.html.twig', [
            'part_one' => $daySeven->partOne(),
            'part_two' => $daySeven->partTwo(),
        ]);
    }
}
