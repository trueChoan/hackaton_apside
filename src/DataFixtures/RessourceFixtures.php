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
        for ($i = 0; $i  < 40; $i ++) { 
            $ressource = new Ressource();

            $ressource->setName('Resource');
            $ressource->setLink($faker->url());
            $ressource->setProject($this->getReference('project_' . rand(0, 9)));

            $manager->persist($ressource);
        }
        
        // $manager->persist($product);

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
