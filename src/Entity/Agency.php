<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AgencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: AgencyRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'agency'],
    formats: ['json'],
    collectionOperations: ['get', 'post'],
    itemOperations: ['get']
)]
class Agency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['agency', 'project'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['agency', 'getUser', 'getJob', 'project'])]
    private $name;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'agency', cascade: ["persist"])]
    #[Groups('agency')]
    private $users;

    #[ORM\ManyToMany(targetEntity: Project::class, mappedBy: 'agency')]
    #[Groups('agency')]
    private $projects;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addAgency($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeAgency($this);
        }

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
            $project->addAgency($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            $project->removeAgency($this);
        }

        return $this;
    }
}
