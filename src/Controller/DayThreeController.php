<?php

declare(strict_types=1);

namespace App\Controller;

use App\Puzzle\DayThree;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DayThreeController extends AbstractController
{
    #[Route('/day/3', name: 'day_three')]
    public function index(DayThree $dayThree): Response
    {
        return $this->render('puzzle/day_three.html.twig', [
            'part_one' => $dayThree->partOne(),
            'part_two' => $dayThree->partTwo(),
        ]);
    }
}
