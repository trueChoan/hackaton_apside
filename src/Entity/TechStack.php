<?php

namespace App\Entity;

use App\Entity\Project;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TechStackRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: TechStackRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'stack'],
    formats: ['json']
)]
class TechStack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('stack')]

    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    #[Groups('stack')]

    private $techno;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'techStack')]
    #[Groups('stack')]

    private $project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechno(): ?string
    {
        return $this->techno;
    }

    public function setTechno(string $techno): self
    {
        $this->techno = $techno;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }
}
