<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Ressource;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RessourceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < count(ProjectFixtures::PROJECTS); $i++) {
            
            for ($j = 0; $j < 3; $j++) { 
                $ressource = new Ressource();
                $ressource->setName('Resource');
                $ressource->setLink($faker->url());
                $ressource->setProject($this->getReference('project_' . $i));
                $manager->persist($ressource);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          ProjectFixtures::class,
        ];
    }
}
