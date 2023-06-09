<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DestinationRepository::class)]
class Destination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'destination', targetEntity: Land::class, orphanRemoval: true)]
    private Collection $lands;

    #[ORM\OneToMany(mappedBy: 'destination', targetEntity: Restaurant::class)]
    private Collection $restaurants;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icon = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hours_opening = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hours_closing = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $banner = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    public function __construct()
    {
        $this->lands = new ArrayCollection();
        $this->restaurants = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Land>
     */
    public function getLands(): Collection
    {
        return $this->lands;
    }

    public function addLand(Land $land): self
    {
        if (!$this->lands->contains($land)) {
            $this->lands->add($land);
            $land->setDestination($this);
        }

        return $this;
    }

    public function removeLand(Land $land): self
    {
        if ($this->lands->removeElement($land)) {
            // set the owning side to null (unless already changed)
            if ($land->getDestination() === $this) {
                $land->setDestination(null);
            }
        }

        return $this;
    }

    public function getAttractions() : Collection
    {
        $attractions = new ArrayCollection();
        foreach ($this->lands as $land) {
            foreach ($land->getAttractions() as $attraction) {
                $attractions->add($attraction);
            }
        }
        return $attractions;
    }

    /**
     * @return Collection<int, Restaurant>
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function addRestaurant(Restaurant $restaurant): self
    {
        if (!$this->restaurants->contains($restaurant)) {
            $this->restaurants->add($restaurant);
            $restaurant->setDestination($this);
        }

        return $this;
    }

    public function removeRestaurant(Restaurant $restaurant): self
    {
        if ($this->restaurants->removeElement($restaurant)) {
            // set the owning side to null (unless already changed)
            if ($restaurant->getDestination() === $this) {
                $restaurant->setDestination(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getHoursOpening(): ?\DateTimeInterface
    {
        return $this->hours_opening;
    }

    public function setHoursOpening(?\DateTimeInterface $hours_opening): self
    {
        $this->hours_opening = $hours_opening;

        return $this;
    }

    public function getHoursClosing(): ?\DateTimeInterface
    {
        return $this->hours_closing;
    }

    public function setHoursClosing(?\DateTimeInterface $hours_closing): self
    {
        $this->hours_closing = $hours_closing;

        return $this;
    }

    public function getBanner(): ?string
    {
        return $this->banner;
    }

    public function setBanner(?string $banner): self
    {
        $this->banner = $banner;

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
}
