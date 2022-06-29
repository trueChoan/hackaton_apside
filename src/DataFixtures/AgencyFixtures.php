<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Agency;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AgencyFixtures extends Fixture
{
    public const AGENCIES = [
        ['name' => 'Paris'],
        ['name' => 'Lille'],
        ['name' => 'Bruxelles'],
        ['name' => 'Nice'],
        ['name' => 'Tours'],
        ['name' => 'Lyon'],
        ['name' => 'Vernon'],
        ['name' => 'Nantes'],
        ['name' => 'Aix en Provence'],
        ['name' => 'Casablanca'],
        ['name' => 'Genève'],

    ];

    public function load(ObjectManager $manager): void
    {

        foreach (self::AGENCIES as $key => $location) {
            $agency = new Agency();
            $agency->setName($location['name']);
            $this->addReference('agency_' . $key, $agency);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
