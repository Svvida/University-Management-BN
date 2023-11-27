<?php

namespace App\Entity;

use App\Repository\PatientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
 // !Tons of things to fix there!
#[ORM\Entity(repositoryClass: PatientsRepository::class)]
class Patients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $BirthDate = null;

    #[ORM\Column(length: 255)]
    private ?string $Adress = null;

    #[ORM\ManyToOne(inversedBy: 'Patients')]
    private ?Doctors $Doctor = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Roles $Role = null;

    #[ORM\Column(length: 55)]
    private ?string $FirstName = null;

    #[ORM\Column(length: 55)]
    private ?string $LastName = null;

    #[ORM\Column(length: 55)]
    private ?string $Country = null;

    #[ORM\Column(length: 255)]
    private ?string $Phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Gender = null;

    #[ORM\Column(length: 255)]
    private ?string $Pesel = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->BirthDate;
    }

    public function setBirthDate(\DateTimeInterface $BirthDate): static
    {
        $this->BirthDate = $BirthDate;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): static
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getDoctor(): ?Doctors
    {
        return $this->Doctor;
    }

    public function setDoctor(?Doctors $Doctor): static
    {
        $this->Doctor = $Doctor;

        return $this;
    }

    public function getRole(): ?Roles
    {
        return $this->Role;
    }

    public function setRole(?Roles $Role): static
    {
        $this->Role = $Role;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): static
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): static
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): static
    {
        $this->Country = $Country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): static
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): static
    {
        $this->Email = $Email;

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

    public function getPesel(): ?string
    {
        return $this->Pesel;
    }

    public function setPesel(string $Pesel): static
    {
        $this->Pesel = $Pesel;

        return $this;
    }
}
