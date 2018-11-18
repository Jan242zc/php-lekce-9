<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 3)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="date")
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=2)
     * @Assert\Country()
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Assert\Choice({"clothes", "food", "electronics"}, message = "Try again")
     */
    private $favouriteCategory;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *          min = 0,
     *          max = 100)
     */
    private $defaultVat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getFavouriteCategory(): ?string
    {
        return $this->favouriteCategory;
    }

    public function setFavouriteCategory(?string $favouriteCategory): self
    {
        $this->favouriteCategory = $favouriteCategory;

        return $this;
    }

    public function getDefaultVat(): ?int
    {
        return $this->defaultVat;
    }

    public function setDefaultVat(int $defaultVat): self
    {
        $this->defaultVat = $defaultVat;

        return $this;
    }
}
