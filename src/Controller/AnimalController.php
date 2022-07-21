<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/', name: 'animals')]
    public function index(AnimalRepository $repository): Response
    {
        $animals = $repository->findAll();
        return $this->render('animal/animals.html.twig', [
            'animals' => $animals
        ]);
    }

    #[Route('/animal/{id}', name: 'animal')]
    public function getAnimal(Animal $animal): Response
    {
        return $this->render('animal/animal.html.twig', [
            'animal' => $animal
        ]);
    }
}
