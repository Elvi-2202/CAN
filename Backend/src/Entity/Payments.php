<?php

namespace App\Entity;

use App\Repository\PaymentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentsRepository::class)]
class Payments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'payments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Teams $team = null;

    #[ORM\Column(length: 30)]
    private ?string $provider = null;

    #[ORM\Column(length: 255)]
    private ?string $providerRef = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\Column(length: 5)]
    private ?string $currency = null;

    #[ORM\Column(length: 20)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $paidAt = null;

    #[ORM\Column]
    private ?\DateTime $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeam(): ?Teams
    {
        return $this->team;
    }

    public function setTeam(?Teams $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): static
    {
        $this->provider = $provider;

        return $this;
    }

    public function getProviderRef(): ?string
    {
        return $this->providerRef;
    }

    public function setProviderRef(string $providerRef): static
    {
        $this->providerRef = $providerRef;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPaidAt(): ?\DateTime
    {
        return $this->paidAt;
    }

    public function setPaidAt(?\DateTime $paidAt): static
    {
        $this->paidAt = $paidAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
