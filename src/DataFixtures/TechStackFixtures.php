<?php

namespace App\DataFixtures;

use App\Entity\TechStack;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechStackFixtures extends Fixture
{
    public const TECH_STACKS = [
        ['techno' => "PHP/Symfony/Bootstrap/javascript"],
        ['techno' => "React/Node.js/Tailwind/Sass"],
        ['techno' => "Java/Spring /Bootstrap/javascript"],
        ['techno' => "Python/Django/Bulma/javascript"],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::TECH_STACKS as $key => $element) {
            $techStack = new TechStack();

            $techStack->setTechno($element['techno']);
            $manager->persist($techStack);
            $this->addReference('tech_stack_' . $key, $techStack);
        }

        $manager->flush();
    }
}
