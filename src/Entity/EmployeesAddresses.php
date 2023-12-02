<?php

namespace App\Entity;

use App\Repository\EmployeesAddressesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeesAddressesRepository::class)]
class EmployeesAddresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $Country = null;

    #[ORM\Column(length: 255)]
    private ?string $City = null;

    #[ORM\Column(length: 15)]
    private ?string $PostalCode = null;

    #[ORM\Column(length: 255)]
    private ?string $Street = null;

    #[ORM\Column(length: 15)]
    private ?string $BuildingNumber = null;

    #[ORM\Column(length: 15)]
    private ?string $ApartmentNumber = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): static
    {
        $this->City = $City;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->PostalCode;
    }

    public function setPostalCode(string $PostalCode): static
    {
        $this->PostalCode = $PostalCode;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->Street;
    }

    public function setStreet(string $Street): static
    {
        $this->Street = $Street;

        return $this;
    }

    public function getBuildingNumber(): ?string
    {
        return $this->BuildingNumber;
    }

    public function setBuildingNumber(string $BuildingNumber): static
    {
        $this->BuildingNumber = $BuildingNumber;

        return $this;
    }

    public function getApartmentNumber(): ?string
    {
        return $this->ApartmentNumber;
    }

    public function setApartmentNumber(string $ApartmentNumber): static
    {
        $this->ApartmentNumber = $ApartmentNumber;

        return $this;
    }
}
