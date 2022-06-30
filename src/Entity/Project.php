<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'project'],
    formats: ['json']
)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('project')]
    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    #[Groups(['agency', 'getUser', 'project', 'domain'])]
    private $name;

    #[ORM\Column(type: 'text')]
    #[Groups(['agency', 'getUser', 'project', 'domain'])]
    private $description;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Ressource::class)]
    #[Groups(['agency', 'getUser', 'project', 'domain'])]
    private $ressource;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Domain::class)]
    #[Groups(['agency', 'getUser', 'project'])]
    private $domain;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: TechStack::class)]
    #[Groups(['agency', 'getUser', 'project', 'domain'])]
    private $techStack;

    #[ORM\ManyToMany(targetEntity: Agency::class, inversedBy: 'projects')]
    #[Groups(['project', 'getUser', 'domain'])]
    private $agency;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'projects')]
    #[Groups('project')]
    private $user;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Comment::class)]
    #[Groups('project')]
    private $comment;

    public function __construct()
    {
        $this->ressource = new ArrayCollection();
        $this->domain = new ArrayCollection();
        $this->techStack = new ArrayCollection();
        $this->agency = new ArrayCollection();
        $this->user = new ArrayCollection();
        $this->comment = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Ressource>
     */
    public function getRessource(): Collection
    {
        return $this->ressource;
    }

    public function addRessource(Ressource $ressource): self
    {
        if (!$this->ressource->contains($ressource)) {
            $this->ressource[] = $ressource;
            $ressource->setProject($this);
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): self
    {
        if ($this->ressource->removeElement($ressource)) {
            // set the owning side to null (unless already changed)
            if ($ressource->getProject() === $this) {
                $ressource->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Domain>
     */
    public function getDomain(): Collection
    {
        return $this->domain;
    }

    public function addDomain(Domain $domain): self
    {
        if (!$this->domain->contains($domain)) {
            $this->domain[] = $domain;
            $domain->setProject($this);
        }

        return $this;
    }

    public function removeDomain(Domain $domain): self
    {
        if ($this->domain->removeElement($domain)) {
            // set the owning side to null (unless already changed)
            if ($domain->getProject() === $this) {
                $domain->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TechStack>
     */
    public function getTechStack(): Collection
    {
        return $this->techStack;
    }

    public function addTechStack(TechStack $techStack): self
    {
        if (!$this->techStack->contains($techStack)) {
            $this->techStack[] = $techStack;
            $techStack->setProject($this);
        }

        return $this;
    }

    public function removeTechStack(TechStack $techStack): self
    {
        if ($this->techStack->removeElement($techStack)) {
            // set the owning side to null (unless already changed)
            if ($techStack->getProject() === $this) {
                $techStack->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Agency>
     */
    public function getAgency(): Collection
    {
        return $this->agency;
    }

    public function addAgency(Agency $agency): self
    {
        if (!$this->agency->contains($agency)) {
            $this->agency[] = $agency;
        }

        return $this;
    }

    public function removeAgency(Agency $agency): self
    {
        $this->agency->removeElement($agency);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
            $comment->setProject($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getProject() === $this) {
                $comment->setProject(null);
            }
        }

        return $this;
    }
}
