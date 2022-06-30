<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;


class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName('male' | 'female'));
            $user->setLastname($faker->lastname());
            $user->setMail($faker->email());
            $user->addAgency($this->getReference('agency_' . rand(0, 10)));
            $user->setJobPosition($this->getReference('job_' . rand(0, 9)));
            $this->addReference('user_' . $i, $user);

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont SeasonFixtures dépend
        return [
            AgencyFixtures::class,
            JobPositionFixtures::class
        ];
    }
}
