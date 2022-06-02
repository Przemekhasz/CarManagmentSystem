<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CarCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarCategoryRepository::class)
 */
#[ApiResource]
class CarCategory
{
    use Traits\IdTrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\OneToOne(targetEntity=Car::class, mappedBy="category", cascade={"persist", "remove"})
     */
    private ?Car $car;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        // unset the owning side of the relation if necessary
        if ($car === null && $this->car !== null) {
            $this->car->setCategory(null);
        }

        // set the owning side of the relation if necessary
        if ($car !== null && $car->getCategory() !== $this) {
            $car->setCategory($this);
        }

        $this->car = $car;

        return $this;
    }
}
