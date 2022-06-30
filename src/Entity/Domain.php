<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DomainRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: DomainRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'domain'],
    formats: ['json']
)]
class Domain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('domain')]

    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    #[Groups('domain')]
    private $name;

    #[ORM\Column(type: 'string', length: 45)]
    #[Groups('domain')]
    private $color;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    #[Groups('domain')]
    private $image;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'domain')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('domain')]
    private $project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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
