<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age_min;

    /**
     * @ORM\Column(type="integer")
     */
    private $age_max;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $eco_friendly;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $photo;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="array")
     */
    private $target = [];

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $link;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgeMin(): ?string
    {
        return $this->age_min;
    }

    public function setAgeMin(string $age_min): self
    {
        $this->age_min = $age_min;

        return $this;
    }

    public function getAgeMax(): ?int
    {
        return $this->age_max;
    }

    public function setAgeMax(int $age_max): self
    {
        $this->age_max = $age_max;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEcoFriendly(): ?bool
    {
        return $this->eco_friendly;
    }

    public function setEcoFriendly(bool $eco_friendly): self
    {
        $this->eco_friendly = $eco_friendly;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPriceMin(): ?float
    {
        return $this->price_min;
    }

    public function setPriceMin(float $price_min): self
    {
        $this->price_min = $price_min;

        return $this;
    }

    public function getPriceMax(): ?float
    {
        return $this->price_max;
    }

    public function setPriceMax(float $price_max): self
    {
        $this->price_max = $price_max;

        return $this;
    }

    public function getTarget(): ?array
    {
        return $this->target;
    }

    public function setTarget(array $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}
