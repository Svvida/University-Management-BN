<?php

namespace App\Entity;

use App\Repository\DoctorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctorsRepository::class)]
class Doctors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $Name = null;

    #[ORM\ManyToMany(targetEntity: Specializations::class)]
    private Collection $Specializations;

    #[ORM\OneToMany(mappedBy: 'Doctor', targetEntity: Patients::class)]
    private Collection $Patients;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Roles $Role = null;

    public function __construct()
    {
        $this->Specializations = new ArrayCollection();
        $this->Patients = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Specializations>
     */
    public function getSpecializations(): Collection
    {
        return $this->Specializations;
    }

    public function addSpecialization(Specializations $specialization): static
    {
        if (!$this->Specializations->contains($specialization)) {
            $this->Specializations->add($specialization);
        }

        return $this;
    }

    public function removeSpecialization(Specializations $specialization): static
    {
        $this->Specializations->removeElement($specialization);

        return $this;
    }

    /**
     * @return Collection<int, Patients>
     */
    public function getPatients(): Collection
    {
        return $this->Patients;
    }

    public function addPatient(Patients $patient): static
    {
        if (!$this->Patients->contains($patient)) {
            $this->Patients->add($patient);
            $patient->setDoctor($this);
        }

        return $this;
    }

    public function removePatient(Patients $patient): static
    {
        if ($this->Patients->removeElement($patient)) {
            // set the owning side to null (unless already changed)
            if ($patient->getDoctor() === $this) {
                $patient->setDoctor(null);
            }
        }

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
}
