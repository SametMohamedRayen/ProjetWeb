<?php

namespace App\Entity;

use App\Repository\EndroitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="endroit")
 * @ORM\Entity(repositoryClass=EndroitRepository::class)
 */
class Endroit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
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
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="float")
     */
    private $price_min;

    /**
     * @ORM\Column(type="float")
     */
    private $price_max;

    /**
     * @ORM\Column(type="array")
     */
    private $target = [];

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $location;

    /**
     * @ORM\Column(type="time")
     */
    private $open;

    /**
     * @ORM\Column(type="time")
     */
    private $close;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgeMin(): ?int
    {
        return $this->age_min;
    }

    public function setAgeMin(int $age_min): self
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

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getOpen(): ?\DateTimeInterface
    {
        return $this->open;
    }

    public function setOpen(\DateTimeInterface $open): self
    {
        $this->open = $open;

        return $this;
    }

    public function getClose(): ?\DateTimeInterface
    {
        return $this->close;
    }

    public function setClose(\DateTimeInterface $close): self
    {
        $this->close = $close;

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

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }
}
