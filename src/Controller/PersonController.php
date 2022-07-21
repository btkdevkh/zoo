<?php

namespace App\Controller;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    #[Route('/persons', name: 'persons')]
    public function index(PersonRepository $repository): Response
    {
        $persons = $repository->findAll();
        return $this->render('person/persons.html.twig', [
            'persons' => $persons
        ]);
    }

    #[Route('/person/{id}', name: 'person')]
    public function getPerson(Person $person): Response
    {
        return $this->render('person/person.html.twig', [
            'person' => $person
        ]);
    }
}
