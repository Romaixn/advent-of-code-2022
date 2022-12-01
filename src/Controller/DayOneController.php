<?php

declare(strict_types=1);

namespace App\Controller;

use App\Puzzle\DayOne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DayOneController extends AbstractController
{
    #[Route('/day/one', name: 'day_one')]
    public function index(DayOne $dayOne): Response
    {
        return $this->render('day_one/index.html.twig', [
            'part_one' => $dayOne->partOne(),
            'part_two' => $dayOne->partTwo(),
        ]);
    }
}
