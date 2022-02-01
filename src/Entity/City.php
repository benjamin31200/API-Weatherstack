<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
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
    private $city1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity1(): ?string
    {
        return $this->city1;
    }

    public function setCity1(string $city1): self
    {
        $this->city1 = $city1;

        return $this;
    }
}