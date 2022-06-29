<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 45)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    private $lastname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $password;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mail;

    #[ORM\Column(type: 'json')]
    private $role = [];

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $avatar;

    #[ORM\ManyToOne(targetEntity: JobPosition::class, inversedBy: 'users')]
    private $jobPosition;

    #[ORM\ManyToMany(targetEntity: Agency::class, inversedBy: 'users')]
    private $agency;

    public function __construct()
    {
        $this->agency = new ArrayCollection();
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
}
