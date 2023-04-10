<?php

namespace App\Entity;

use App\Repository\HotelTravelTimeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelTravelTimeRepository::class)]
class HotelTravelTime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'hotelTravelTime', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hotel $hotel = null;

    #[ORM\Column(nullable: true)]
    private ?int $car = null;

    #[ORM\Column(nullable: true)]
    private ?int $bus = null;

    #[ORM\Column(nullable: true)]
    private ?int $walk = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getCar(): ?int
    {
        return $this->car;
    }

    public function setCar(?int $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getBus(): ?int
    {
        return $this->bus;
    }

    public function setBus(?int $bus): self
    {
        $this->bus = $bus;

        return $this;
    }

    public function getWalk(): ?int
    {
        return $this->walk;
    }

    public function setWalk(?int $walk): self
    {
        $this->walk = $walk;

        return $this;
    }
}
