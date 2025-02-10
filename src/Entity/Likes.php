<?php

namespace App\Entity;

use App\Repository\LikesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikesRepository::class)]
class Likes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Posts $the_post = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $the_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThePost(): ?Posts
    {
        return $this->the_post;
    }

    public function setThePost(?Posts $the_post): static
    {
        $this->the_post = $the_post;

        return $this;
    }

    public function getTheUser(): ?Users
    {
        return $this->the_user;
    }

    public function setTheUser(?Users $the_user): static
    {
        $this->the_user = $the_user;

        return $this;
    }
}
