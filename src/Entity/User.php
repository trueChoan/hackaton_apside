<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'get'],
    formats: ['json']
)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('get')]
    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    #[Groups('get')]
    private $firstname;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    #[Groups('get')]
    private $lastname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $password;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups('get')]
    private $mail;

    #[ORM\Column(type: 'json')]
    #[Groups('get')]
    private $role = [];

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups('get')]
    private $avatar;

    #[ORM\ManyToOne(targetEntity: JobPosition::class, inversedBy: 'users')]
    #[Groups('get')]
    private $jobPosition;

    #[ORM\ManyToMany(targetEntity: Agency::class, inversedBy: 'users')]
    #[Groups('get')]
    private $agency;

    #[ORM\ManyToMany(targetEntity: Project::class, mappedBy: 'user')]
    private $projects;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Comment::class)]
    private $comment;

    public function __construct()
    {
        $this->agency = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->comment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(array $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getJobPosition(): ?JobPosition
    {
        return $this->jobPosition;
    }

    public function setJobPosition(?JobPosition $jopPosition): self
    {
        $this->jopPosition = $jopPosition;

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
            $project->addUser($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            $project->removeUser($this);
        }

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
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }
}
