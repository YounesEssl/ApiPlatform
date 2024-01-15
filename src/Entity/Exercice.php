<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ExerciceRepository;

#[ApiResource]
#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{

    #[ORM\ManyToMany(targetEntity: Sessions::class, mappedBy: 'exercices')]
    private Collection $sessions;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]

    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;
    
    #[ORM\Column]
    private ?int $breakTime = null;

    #[ORM\Column]
    private ?int $series = null;

    #[ORM\Column]
    private ?int $repeats = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
    public function getBreakTime(): ?int
    {
        return $this->breakTime;
    }

    public function setBreakTime(int $breakTime): static
    {
        $this->breakTime = $breakTime;

        return $this;
    }

    public function getSeries(): ?int
    {
        return $this->series;
    }

    public function setSeries(int $series): static
    {
        $this->series = $series;

        return $this;
    }

    public function getRepeats(): ?int
    {
        return $this->repeats;
    }

    public function setRepeats(int $repeats): static
    {
        $this->repeats = $repeats;

        return $this;
    }

        /**
     * @return Collection|Sessions[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }
}
