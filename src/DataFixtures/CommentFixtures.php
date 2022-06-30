<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Comment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        
        for ($i = 0; $i < 100 ; $i++) { 
            $comment = new Comment();

            $comment->setComment($faker->paragraph());
            $comment->setProject($this->getReference('project_' . rand(0, 9)));
            $comment->setUser($this->getReference('user_' . rand(0, 19)));

            $manager->persist($comment);
        }
       
     

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          ProjectFixtures::class,
          UserFixtures::class,
        ];
    }
}
