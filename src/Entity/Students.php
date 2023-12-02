<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentsRepository::class)]
class Students
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $Name = null;

    #[ORM\Column(length: 55)]
    private ?string $Surname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateOfBirth = null;

    #[ORM\Column(length: 11)]
    private ?string $PESEL = null;

    #[ORM\Column(length: 21)]
    private ?string $Gender = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?StudentsAddresses $Address = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->Surname;
    }

    public function setSurname(string $Surname): static
    {
        $this->Surname = $Surname;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->DateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $DateOfBirth): static
    {
        $this->DateOfBirth = $DateOfBirth;

        return $this;
    }

    public function getPESEL(): ?string
    {
        return $this->PESEL;
    }

    public function setPESEL(string $PESEL): static
    {
        $this->PESEL = $PESEL;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->Gender;
    }

    public function setGender(string $Gender): static
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getAddress(): ?StudentsAddresses
    {
        return $this->Address;
    }

    public function setAddress(StudentsAddresses $Address): static
    {
        $this->Address = $Address;

        return $this;
    }
}
