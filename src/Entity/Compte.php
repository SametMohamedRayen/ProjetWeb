<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 * @UniqueEntity(fields={"adresse_mail"}, message="There is already an account with this adresse_mail")
 */
class Compte
{
    /**
     * @ORM\Id

     * @ORM\Column(type="string")
     * @ORM\OneToMany(targetEntity="App\Entity\Indoor",mappedBy="user")
     * @ORM\OneToMany(targetEntity="App\Entity\Endroit",mappedBy="user")
     * @ORM\OneToMany(targetEntity="App\Entity\Evenement",mappedBy="user")
     */

    private $adresseMail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="date")
     */
    private $DateBirth;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PlaceResidence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $occupation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;


    private $roles = array();
    public function getRoles() {
        if (empty($this->roles)) {
            return ['ROLE_USER'];
        }
        return $this->roles;
    }

    function addRole($role) {
        $this->roles[] = $role;
    }
    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->DateBirth;
    }

    public function setDateBirth(\DateTimeInterface $DateBirth): self
    {
        $this->DateBirth = $DateBirth;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPlaceResidence(): ?string
    {
        return $this->PlaceResidence;
    }

    public function setPlaceResidence(string $PlaceResidence): self
    {
        $this->PlaceResidence = $PlaceResidence;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }


    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
