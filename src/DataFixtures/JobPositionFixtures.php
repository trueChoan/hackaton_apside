<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\JobPosition;
use Faker\Factory;


class JobPositionFixtures extends Fixture
{
    public const JOBS = [
        ['role' => 'Data Analyst'],
        ['role' => 'Web Developper Java'],
        ['role' => 'Web Developper PHP'],
        ['role' => 'Chef de Projet Innovation Industrielle'],
        ['role' => 'Developpeur IA'],
        ['role' => 'Tech Lead'],
        ['role' => 'Ingenieur d\'étude et développment SI'],
        ['role' => 'Chef de Projet Banque'],
        ['role' => 'Analyste développeur '],
        ['role' => 'Product Owner'],
        ['role' => '
        Responsable formation interne aéronautique']

    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        foreach (self::JOBS as $key => $job) {
            $jobPosition = new JobPosition();
            $jobPosition->setRole($job['role']);
            $manager->persist($jobPosition);
            $this->addReference('job_' . $key, $jobPosition);
        }

        $manager->flush();
    }
}
