<?php

namespace App\Entity;

use App\Repository\ReportsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReportsRepository::class)]
class Reports
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Posts $reported_post = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $reporter = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReportedPost(): ?Posts
    {
        return $this->reported_post;
    }

    public function setReportedPost(?Posts $reported_post): static
    {
        $this->reported_post = $reported_post;

        return $this;
    }

    public function getReporter(): ?Users
    {
        return $this->reporter;
    }

    public function setReporter(?Users $reporter): static
    {
        $this->reporter = $reporter;

        return $this;
    }
}
