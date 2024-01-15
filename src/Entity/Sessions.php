<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SessionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ApiResource]
#[ORM\Entity(repositoryClass: SessionsRepository::class)]
class Sessions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]

    
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\ManyToMany(targetEntity: Exercice::class)]
    private Collection $exercices;

    #[ORM\Column]
    private ?int $exercicesNumber = null;

    #[ORM\Column]
    private ?int $sessionTime = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $sessionDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExercicesNumber(): ?int
    {
        return $this->exercicesNumber;
    }

    public function setExercicesNumber(int $exercicesNumber): static
    {
        $this->exercicesNumber = $exercicesNumber;

        return $this;
    }

    public function getSessionTime(): ?int
    {
        return $this->sessionTime;
    }

    public function setSessionTime(int $sessionTime): static
    {
        $this->sessionTime = $sessionTime;

        return $this;
    }

    public function getSessionDate(): ?\DateTimeInterface
    {
        return $this->sessionDate;
    }

    public function setSessionDate(\DateTimeInterface $sessionDate): static
    {
        $this->sessionDate = $sessionDate;

        return $this;
    }

    public function __construct()
    {
        $this->exercices = new ArrayCollection();
    }
   /**
     * @return Collection|Exercice[]
     */
    public function getExercices(): Collection
    {
        return $this->exercices;
    }
    public function addExercice(Exercice $exercice): self
    {
        if (!$this->exercices->contains($exercice)) {
            $this->exercices[] = $exercice;
        }

        return $this;
    }
    public function removeExercice(Exercice $exercice): self
    {
        $this->exercices->removeElement($exercice);

        return $this;
    }
}
