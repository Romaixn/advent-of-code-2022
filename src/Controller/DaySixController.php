<?php

declare(strict_types=1);

namespace App\Controller;

use App\Puzzle\DaySix;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DaySixController extends AbstractController
{
    #[Route('/day/6', name: 'day_six')]
    public function index(DaySix $daySix): Response
    {
        return $this->render('puzzle/day_six.html.twig', [
            'part_one' => $daySix->partOne(),
            'part_two' => $daySix->partTwo(),
        ]);
    }
}
