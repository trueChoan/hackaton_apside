<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRESS = [
        ['progression' => 'In preparation'],
        ['progression' => 'Project Done'],
        ['progression' => '0%'],
        ['progression' => '25%'],
        ['progression' => '50%'],
        ['progression' => '75%'],
        ['progression' => '80%'],
        ['progression' => '100%'],
    ];
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i  < 10; $i++) {
            $project = new Project();

            $project->setName($faker->word());
            $project->setDescription($faker->paragraph());

            // $project->addRessource($faker->url());
            $project->setDomain($this->getReference('domain_' . rand(0, 3)));
            $project->setTechStack($this->getReference('tech_stack_' . rand(0, 3)));
            $project->addAgency($this->getReference('agency_' . rand(0, 10)));
            $project->addUser($this->getReference('user_' . rand(0, 19)));
            $project->setProgress(self::PROGRESS[array_rand(self::PROGRESS)]['progression']);
            $project->setCreatedAt($faker->dateTimeThisMonth());
            $manager->persist($project);
            $this->addReference('project_' . $i, $project);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            DomainFixtures::class,
            TechStackFixtures::class,
            UserFixtures::class,
            AgencyFixtures::class
        ];
    }
}
