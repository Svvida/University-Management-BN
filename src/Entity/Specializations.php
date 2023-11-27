<?php

namespace App\Entity;

use App\Repository\SpecializationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecializationsRepository::class)]
class Specializations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $SpecializationName = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecializationName(): ?string
    {
        return $this->SpecializationName;
    }

    public function setSpecializationName(string $SpecializationName): static
    {
        $this->SpecializationName = $SpecializationName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }
}
