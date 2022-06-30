<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;


class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public const PICS = [
        ['flag' => 'portrait-01.jpg'],
        ['flag' => 'portrait-02.jpg'],
        ['flag' => 'portrait-03.jpg'],
        ['flag' => 'portrait-04.jpg'],
        ['flag' => 'portrait-05.jpg'],
        ['flag' => 'portrait-06.jpg'],
        ['flag' => 'portrait-07.jpg'],
        ['flag' => 'portrait-08.jpg'],
        ['flag' => 'portrait-09.jpg'],
        ['flag' => 'portrait-10.jpg'],
        ['flag' => 'portrait-11.jpg'],
        ['flag' => 'portrait-12.jpg'],
        ['flag' => 'portrait-13.jpg'],
        ['flag' => 'portrait-14.jpg'],
        ['flag' => 'portrait-15.jpg'],
        ['flag' => 'portrait-16.jpg'],
        ['flag' => 'portrait-17.jpg'],
        ['flag' => 'portrait-18.jpg'],
        ['flag' => 'portrait-19.jpg'],
        ['flag' => 'portrait-20.jpg'],

    ];
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
            $user->setAvatar(self::PICS[$i]['flag']);
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
