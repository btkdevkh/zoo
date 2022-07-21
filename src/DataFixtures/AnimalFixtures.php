<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Continent;
use App\Entity\Dispose;
use App\Entity\Family;
use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $p1 = new Person();
        $p1->setName('Jim');
        $manager->persist($p1);

        $p2 = new Person();
        $p2->setName('Bella');
        $manager->persist($p2);

        $p3 = new Person();
        $p3->setName('Toto');
        $manager->persist($p3);

        /////////////////////////////////////////////////

        $c1 = new Continent();
        $c1->setLabel('Europe');
        $manager->persist($c1);

        $c2 = new Continent();
        $c2->setLabel('Afrique');
        $manager->persist($c2);

        $c3 = new Continent();
        $c3->setLabel('Asie');
        $manager->persist($c3);

        $c4 = new Continent();
        $c4->setLabel('Océanie');
        $manager->persist($c4);

        $c5 = new Continent();
        $c5->setLabel('Amérique');
        $manager->persist($c5);

        ///////////////////////////////////////////////////////

        $f1 = new Family();
        $f1->setLabel('mammifères')
            ->setDescription('Animaux vertébrés nourrissant leurs petits avec du lait')
        ;
        $manager->persist($f1);

        $f2 = new Family();
        $f2->setLabel('reptiles')
            ->setDescription('Animaux vertébrés qui rampent')
        ;
        $manager->persist($f2);

        $f3 = new Family();
        $f3->setLabel('poissons')
            ->setDescription('Animaux invertébrés du monde aquatique')
        ;
        $manager->persist($f3);

        /////////////////////////////////////////////////////////

        $a1 = new Animal();
        $a1->setName('Chien')
            ->setDescription('Un animal domestique')
            ->setImage('chien.png')
            ->setWeight(10)
            ->setDangerous(false)
            ->setFamily($f1)
            ->addContinent($c1)
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
            ->addContinent($c5)
        ;
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setName('Serpent')
            ->setDescription('Un animal sauvage')
            ->setImage('serpent.png')
            ->setWeight(5)
            ->setDangerous(true)
            ->setFamily($f2)
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
        ;
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setName('Crocodile')
            ->setDescription('Un animal sauvage dangereux')
            ->setImage('croco.png')
            ->setWeight(500)
            ->setDangerous(true)
            ->setFamily($f2)
            ->addContinent($c3)
            ->addContinent($c4)
        ;
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setName('Requin')
            ->setDescription('Un animal marin dangereux')
            ->setImage('requin.png')
            ->setWeight(800)
            ->setDangerous(true)
            ->setFamily($f3)
            ->addContinent($c4)
            ->addContinent($c5)
        ;
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setName('Cochon')
            ->setDescription('Un animal d\'élevage')
            ->setImage('cochon.png')
            ->setWeight(100)
            ->setDangerous(false)
            ->setFamily($f1)
            ->addContinent($c1)
            ->addContinent($c5)
        ;
        $manager->persist($a5);

        $d1 = new Dispose();
        $d1->setPerson($p1)
            ->setAnimal($a1)
            ->setNb(30)
        ;
        $manager->persist($d1);

        $d2 = new Dispose();
        $d2->setPerson($p1)
            ->setAnimal($a2)
            ->setNb(10)
        ;
        $manager->persist($d2);

        $d3 = new Dispose();
        $d3->setPerson($p1)
            ->setAnimal($a3)
            ->setNb(20)
        ;
        $manager->persist($d3);

        $d4 = new Dispose();
        $d4->setPerson($p2)
            ->setAnimal($a4)
            ->setNb(5)
        ;
        $manager->persist($d4);

        $d5 = new Dispose();
        $d5->setPerson($p2)
            ->setAnimal($a4)
            ->setNb(15)
        ;
        $manager->persist($d5);

        $d6 = new Dispose();
        $d6->setPerson($p3)
            ->setAnimal($a5)
            ->setNb(40)
        ;
        $manager->persist($d6);

        $manager->flush();
    }
}
