<?php

namespace App\DataFixtures;

use App\Entity\Domain;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DomainFixtures extends Fixture
{
    public const DOMAINS = [
        ['name' => 'IT expertise', 'color' => 'red', 'image' => 'image'],
        ['name' => 'Information Systems Engineering', 'color' => 'blue', 'image' => 'image'],
        ['name' => 'Infrastructure', 'color' => 'yellow', 'image' => 'image'],
        ['name' => 'Industrial engineering', 'color' => 'green', 'image' => 'image'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DOMAINS as $key => $element) { 
            $domain = new Domain();

            $domain->setName($element['name']);
            $domain->setColor($element['color']);
            $domain->setImage($element['image']);
            $manager->persist($domain);
            $this->addReference('domain_'. $key , $domain);
        } 

        $manager->flush();
    }
}
