<?php

namespace App\Entity;

use App\Repository\TeamTermsAcceptanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamTermsAcceptanceRepository::class)]
class TeamTermsAcceptance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'teamTermsAcceptance', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Teams $team = null;

    #[ORM\Column]
    private ?bool $accepted = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $acceptedAt = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $termsVersion = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $ipAdress = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $userAgent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeam(): ?Teams
    {
        return $this->team;
    }

    public function setTeam(Teams $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function isAccepted(): ?bool
    {
        return $this->accepted;
    }

    public function setAccepted(bool $accepted): static
    {
        $this->accepted = $accepted;

        return $this;
    }

    public function getAcceptedAt(): ?\DateTimeImmutable
    {
        return $this->acceptedAt;
    }

    public function setAcceptedAt(\DateTimeImmutable $acceptedAt): static
    {
        $this->acceptedAt = $acceptedAt;

        return $this;
    }

    public function getTermsVersion(): ?string
    {
        return $this->termsVersion;
    }

    public function setTermsVersion(?string $termsVersion): static
    {
        $this->termsVersion = $termsVersion;

        return $this;
    }

    public function getIpAdress(): ?string
    {
        return $this->ipAdress;
    }

    public function setIpAdress(?string $ipAdress): static
    {
        $this->ipAdress = $ipAdress;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): static
    {
        $this->userAgent = $userAgent;

        return $this;
    }
}
