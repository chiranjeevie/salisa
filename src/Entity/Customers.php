<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CustomersRepository")
 */
class Customers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cust_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isactive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastsname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname_ar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastsname_ar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passwordhash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loyaltypoints;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastorderdate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustId(): ?string
    {
        return $this->cust_id;
    }

    public function setCustId(string $cust_id): self
    {
        $this->cust_id = $cust_id;

        return $this;
    }

    public function getIsactive(): ?bool
    {
        return $this->isactive;
    }

    public function setIsactive(bool $isactive): self
    {
        $this->isactive = $isactive;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastsname(): ?string
    {
        return $this->lastsname;
    }

    public function setLastsname(string $lastsname): self
    {
        $this->lastsname = $lastsname;

        return $this;
    }

    public function getFirstnameAr(): ?string
    {
        return $this->firstname_ar;
    }

    public function setFirstnameAr(string $firstname_ar): self
    {
        $this->firstname_ar = $firstname_ar;

        return $this;
    }

    public function getLastsnameAr(): ?string
    {
        return $this->lastsname_ar;
    }

    public function setLastsnameAr(string $lastsname_ar): self
    {
        $this->lastsname_ar = $lastsname_ar;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPasswordhash(): ?string
    {
        return $this->passwordhash;
    }

    public function setPasswordhash(string $passwordhash): self
    {
        $this->passwordhash = $passwordhash;

        return $this;
    }

    public function getLoyaltypoints(): ?string
    {
        return $this->loyaltypoints;
    }

    public function setLoyaltypoints(string $loyaltypoints): self
    {
        $this->loyaltypoints = $loyaltypoints;

        return $this;
    }

    public function getLastorderdate(): ?\DateTimeInterface
    {
        return $this->lastorderdate;
    }

    public function setLastorderdate(\DateTimeInterface $lastorderdate): self
    {
        $this->lastorderdate = $lastorderdate;

        return $this;
    }
}
