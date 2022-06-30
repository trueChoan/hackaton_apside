<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Agency;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AgencyFixtures extends Fixture
{
    public const AGENCIES = [
        ['name' => 'Paris', 'flag' => 'france.png'],
        ['name' => 'Lille', 'flag' => 'france.png'],
        ['name' => 'Bruxelles', 'flag' => 'belgique.png'],
        ['name' => 'Nice', 'flag' => 'france.png'],
        ['name' => 'Tours', 'flag' => 'france.png'],
        ['name' => 'Lyon', 'flag' => 'france.png'],
        ['name' => 'Vernon', 'flag' => 'france.png'],
        ['name' => 'Nantes', 'flag' => 'france.png'],
        ['name' => 'Aix en Provence', 'flag' => 'france.png'],
        ['name' => 'Casablanca', 'flag' => 'maroc.png'],
        ['name' => 'Genève', 'flag' => 'suisse.png'],

    ];

    public function load(ObjectManager $manager): void
    {

        foreach (self::AGENCIES as $key => $location) {
            $agency = new Agency();
            $agency->setName($location['name']);
            $agency->setFlag($location['flag']);
            $manager->persist($agency);
            $this->addReference('agency_' . $key, $agency);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
