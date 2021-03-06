<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DomainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    #[Groups(['domain', 'project', 'getUser'])]

    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    #[Groups(['domain', 'project', 'getUser'])]
    private $name;

    #[ORM\Column(type: 'string', length: 45)]
    #[Groups(['domain', 'project', 'getUser'])]
    private $color;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    #[Groups(['domain', 'project', 'getUser'])]
    private $image;

    #[ORM\OneToMany(mappedBy: 'domain', targetEntity: Project::class)]
    #[Groups('domain')]
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Project>
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setDomain($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getDomain() === $this) {
                $project->setDomain(null);
            }
        }

        return $this;
    }
}
