<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => 'comment'],
    formats: ['json']
)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('comment')]
    private $id;

    #[ORM\Column(type: 'text')]
    #[Groups(['comment', 'getUser'])]
    private $comment;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'comment')]
    #[Groups(['comment', 'getUser'])]
    private $project;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'comment')]
    #[Groups('comment')]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
