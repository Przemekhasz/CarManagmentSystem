<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Carbon\Carbon;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={},
 *          "put"
 *     },
 *     shortName="Car",
 *     normalizationContext={"groups"={"car_listing:read"}, "swagger_definition_name"="Read"},
 *     denormalizationContext={"groups"={"car_listing:write"}, "swagger_definition_name"="Write"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Car
{
    use Traits\IdTrait;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?string $name;

    /**
     * @ORM\OneToOne(targetEntity=CarCategory::class, inversedBy="car", cascade={"persist", "remove"})
     */
    private ?CarCategory $category;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?string $brand;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private int $engineCapacity;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?string $model;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?string $version;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?string $generation;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private int $mileage;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private int $displacement;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private int $power;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?string $transmission;

    /**
     * @ORM\ManyToOne(targetEntity=TypeOfFuel::class, inversedBy="car")
     */
    private ?TypeOfFuel $typeOfFuel;

    /**
     * @ORM\ManyToOne(targetEntity=Propulsion::class, inversedBy="car")
     */
    private ?Propulsion $propulsions;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private int $combustion;

    /**
     * @ORM\ManyToOne(targetEntity=BodyType::class, inversedBy="car")
     */
    private ?BodyType $bodyType;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="car")
     */
    private ?Color $color;

    /**
     * @ORM\ManyToOne(targetEntity=CountryOfOrigin::class, inversedBy="car")
     */
    private ?CountryOfOrigin $countryOfOrigin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?string $vehicleRegistrationNumber;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?string $vin;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"car_listing:read", "car_listing:write"})
     */
    private ?\DateTimeInterface $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->Name = $name;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getEngineCapacity(): ?int
    {
        return $this->engineCapacity;
    }

    public function setEngineCapacity(?int $engineCapacity): self
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getCategory(): ?CarCategory
    {
        return $this->category;
    }

    public function setCategory(?CarCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getGeneration(): ?string
    {
        return $this->generation;
    }

    public function setGeneration(?string $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(?int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getDisplacement(): ?int
    {
        return $this->displacement;
    }

    public function setDisplacement(?int $displacement): self
    {
        $this->displacement = $displacement;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(?int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(?string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getTypeOfFuel(): ?TypeOfFuel
    {
        return $this->typeOfFuel;
    }

    public function setTypeOfFuel(?TypeOfFuel $typeOfFuel): self
    {
        $this->typeOfFuel = $typeOfFuel;

        return $this;
    }

    public function getPropulsion(): ?Propulsion
    {
        return $this->propulsion;
    }

    public function setPropulsion(?Propulsion $propulsion): self
    {
        $this->propulsion = $propulsion;

        return $this;
    }

    public function getCombustion(): ?int
    {
        return $this->combustion;
    }

    public function setCombustion(?int $combustion): self
    {
        $this->combustion = $combustion;

        return $this;
    }

    public function getBodyType(): ?BodyType
    {
        return $this->bodyType;
    }

    public function setBodyType(?BodyType $bodyType): self
    {
        $this->bodyType = $bodyType;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCountryOfOrigin(): ?CountryOfOrigin
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin(?CountryOfOrigin $countryOfOrigin): self
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    public function getVehicleRegistrationNumber(): ?string
    {
        return $this->vehicleRegistrationNumber;
    }

    public function setVehicleRegistrationNumber(?string $vehicleRegistrationNumber): self
    {
        $this->vehicleRegistrationNumber = $vehicleRegistrationNumber;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(?string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @Groups("car_listing:read")
     */
    public function getCreatedAtAgo(): string
    {
        return Carbon::instance($this->getCreatedAt())->diffForHumans();
    }
}
