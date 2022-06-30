<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RessourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: RessourceRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'ressource'],
    formats: ['json']
)]
class Ressource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[GROUPS(['ressource', 'project'])]
    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    #[GROUPS(['ressource', 'project', 'getUser'])]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[GROUPS(['ressource', 'project', 'getUser'])]
    private $link;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'ressource')]
    #[GROUPS('ressource')]
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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

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
