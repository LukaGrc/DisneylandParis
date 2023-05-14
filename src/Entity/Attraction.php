<?php

namespace App\Entity;

use App\Repository\AttractionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttractionRepository::class)]
class Attraction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(nullable: true)]
    private ?float $premieraccess_price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $id_api = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $id_api_singlerider = null;

    #[ORM\ManyToOne(inversedBy: 'attractions')]
    private ?AttractionCategory $category = null;

    #[ORM\ManyToOne(inversedBy: 'attractions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\Column(nullable: true)]
    private ?int $min_height = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPremieraccessPrice(): ?float
    {
        return $this->premieraccess_price;
    }

    public function setPremieraccessPrice(?float $premieraccess_price): self
    {
        $this->premieraccess_price = $premieraccess_price;

        return $this;
    }

    public function getIdApi(): ?string
    {
        return $this->id_api;
    }

    public function setIdApi(?string $id_api): self
    {
        $this->id_api = $id_api;

        return $this;
    }

    public function getIdApiSinglerider(): ?string
    {
        return $this->id_api_singlerider;
    }

    public function setIdApiSinglerider(?string $id_api_singlerider): self
    {
        $this->id_api_singlerider = $id_api_singlerider;

        return $this;
    }

    public function getCategory(): ?AttractionCategory
    {
        return $this->category;
    }

    public function setCategory(?AttractionCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getLand(): ?Land
    {
        return $this->land;
    }

    public function setLand(?Land $land): self
    {
        $this->land = $land;

        return $this;
    }

    public function getMinHeight(): ?int
    {
        return $this->min_height;
    }

    public function setMinHeight(?int $min_height): self
    {
        $this->min_height = $min_height;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
