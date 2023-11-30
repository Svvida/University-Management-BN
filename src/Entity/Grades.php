<?php

namespace App\Entity;

use App\Repository\GradesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GradesRepository::class)]
class Grades
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2)]
    private ?string $GradeEU = null;

    #[ORM\Column(length: 2)]
    private ?string $GradeUSA = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 2)]
    private ?string $Value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGradeEU(): ?string
    {
        return $this->GradeEU;
    }

    public function setGradeEU(string $GradeEU): static
    {
        $this->GradeEU = $GradeEU;

        return $this;
    }

    public function getGradeUSA(): ?string
    {
        return $this->GradeUSA;
    }

    public function setGradeUSA(string $GradeUSA): static
    {
        $this->GradeUSA = $GradeUSA;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->Value;
    }

    public function setValue(string $Value): static
    {
        $this->Value = $Value;

        return $this;
    }
}
