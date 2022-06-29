<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TechStackRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: TechStackRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'get'],
    formats: ['json']
)]
class TechStack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('get')]

    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    #[Groups('get')]

    private $techno;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'techStack')]
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
