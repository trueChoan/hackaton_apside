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

    public const PROJECTS = [
        ['name' => 'Avion-hélico de XTI Aircraft', 'description' => "Un avion qui décolle et atterri comme un hélico mais qui se propulse comme un jet. Le projet Trifan 600 de XTI Aircraft veut révolutionner le design et la technologie des avions qui ont peu changé en réalité depuis une dizaine d'années selon Robert La Belle, PDG de l\'entreprise. Le Trifan 600 devrait être disponible à un très bas coût (5,6 millions de dollars) et ne devrait coûter que 350 dollars par heure de vol grâce à une technologie hybride."],
        ['name' => "Batteries au lithium plus sûres", 'description' => "Electric Power Systems veut produire des batteries au lithium plus sûres et plus intelligentes pour les avions. Comme les avions ne peuvent utiliser le rafraîchissement par l'air, les batteries ont plus de chance de surchauffer, voire d'exploser développe Nathan Millecam, PDG de la start-up. "],
        ['name' => "Chorus Pro 2017", 'description' => "Ce portail, qui vient d’être ouvert par l’AIFE (Agence pour l’informatique financière de l’Etat), porte les espoirs du gouvernement en matière de dématérialisation des factures. Au 1er janvier prochain, toutes les entités publiques ainsi que les grandes entreprises souhaitant facturer l’administration devront avoir recours à ce portail unique pour le dépôt, la réception et la transmission des factures électroniques. Cette obligation sera progressivement étendue à tous les fournisseurs de l’Etat."],
        ['name' => "BLINDTEST MULTIJOUEUR", 'description' => "Notre projet est un site web sur lequel nous pouvons jouer à un jeu qui est un BlindTest en ligne avec d’autres joueurs. On veut créer un jeu connecté et accessible à tous. Le but du jeu est de gagner un maximum de points."],
        ['name' => "Rénovation des datacenters", 'description' => "Pour rationaliser son parc de datacenters (une centaine de salles recensées, d’une superficie inférieure à 200 m2 dans 75 % des cas), l’Etat s’est lancé dans une logique de ‘plaques’, des centres de grande taille gérés par quelques grands ministères où seront hébergées les infrastructures d’autres administrations. C’est dans cette logique de rationalisation que s’inscrivent les projets de regroupement des datacenters du ministère de l’Economie et des Finances et d’aménagement d’un datacenter sécurisé à l’Intérieur (B015). "],
        ['name' => "PPNG (Plan Préfectures Nouvelle Génération)", 'description' => "Sans la tentative du ministère de l’Intérieur de faire passer en toute discrétion un décret sur le méga-fichier TES, l’acronyme PPNG ne serait peut-être jamais sorti du jargon de l’administration. Derrière ce sigle se cache une réforme des procédures de délivrance de titres (passeports et cartes d’identité, que l’Intérieur voudrait fusionner dans le fameux fichier biométrique unique TES, mais aussi permis de conduire et certificats d’immatriculation)… et de sérieuses coupes claires dans les effectifs des préfectures. "],
        ['name' => "Bridge project", 'description' => "Même s’il n’est généralement pas perçu comme une entreprise EdTech, Bridge International Academies (a) utilise les TIC de multiples façons novatrices, dans le cadre de son modèle économique. À l’évidence, ce prestataire privé ne laisse pas indifférent (il suffit de consulter quelques minutes Google, ou la page Wikipedia (a) consacrée à cette société, pour tomber sur des discussions passionnantes à son sujet, que je n’ai pas l’intention d’explorer ici), mais l’emploi qu’il fait de la technologie est indéniablement remarquable."],
        ['name' => "Enuma (Kitkit School)", 'description' => "Enuma (a) est un finaliste du concours XPRIZE (a) pour son projet Kitkit School. S’appuyant sur les informations et le savoir-faire acquis au contact d’élèves ayant des besoins éducatifs spécifiques, ainsi que dans l’univers des jeux en ligne, cet acteur a pour objectif de promouvoir l’apprentissage de la lecture, de l’écriture et du calcul par les jeunes enfants."],
        ['name' => "Chorus Pro 2022", 'description' => "Ce portail, qui vient d’être ouvert par l’AIFE (Agence pour l’informatique financière de l’Etat), porte les espoirs du gouvernement en matière de dématérialisation des factures. Au 1er janvier prochain, toutes les entités publiques ainsi que les grandes entreprises souhaitant facturer l’administration devront avoir recours à ce portail unique pour le dépôt, la réception et la transmission des factures électroniques. Cette obligation sera progressivement étendue à tous les fournisseurs de l’Etat."],
        ['name' => "University of the People", 'description' => "University of the People (UoPeople) (a) est une université en ligne sans frais d’inscription, qui délivre des diplômes (a) homologués, en s’attachant tout particulièrement à soutenir les apprenants dans les pays en développement."],
    ];
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i  < 10; $i++) {
            $project = new Project();

            $project->setName(self::PROJECTS[$i]['name']);
            $project->setDescription(self::PROJECTS[$i]['description']);

            // $project->addRessource($faker->url());
            $project->setDomain($this->getReference('domain_' . rand(0, 3)));
            $project->setTechStack($this->getReference('tech_stack_' . rand(0, 3)));
            $project->addAgency($this->getReference('agency_' . rand(0, 10)));
            $numberUser = rand(4, 10);
            for ($j = 0; $j < $numberUser; $j++) {
                $project->addUser($this->getReference('user_' . rand(1, 19)));
            }

            $project->setProgress(self::PROGRESS[array_rand(self::PROGRESS)]['progression']);
            $project->setCreatedAt($faker->dateTimeThisMonth());
            $project->setProductOwner($faker->firstName('male' | 'female'));
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
