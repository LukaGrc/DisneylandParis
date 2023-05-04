<?php

namespace App\Entity;

use App\Repository\HotelRoomTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRoomTypeRepository::class)]
class HotelRoomType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'RoomTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hotel $hotel = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $area = null;

    #[ORM\ManyToMany(targetEntity: HotelRoomStuff::class, mappedBy: 'romm_type')]
    private Collection $Stuffs;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: HotelRoom::class)]
    private Collection $rooms;

    #[ORM\Column(nullable: true)]
    private ?int $capacity = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    public function __construct()
    {
        $this->Stuffs = new ArrayCollection();
        $this->rooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(int $area): self
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @return Collection<int, HotelRoomStuff>
     */
    public function getStuffs(): Collection
    {
        return $this->Stuffs;
    }

    public function addStuff(HotelRoomStuff $stuff): self
    {
        if (!$this->Stuffs->contains($stuff)) {
            $this->Stuffs->add($stuff);
            $stuff->addRommType($this);
        }

        return $this;
    }

    public function removeStuff(HotelRoomStuff $stuff): self
    {
        if ($this->Stuffs->removeElement($stuff)) {
            $stuff->removeRommType($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, HotelRoom>
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(HotelRoom $room): self
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
            $room->setType($this);
        }

        return $this;
    }

    public function removeRoom(HotelRoom $room): self
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getType() === $this) {
                $room->setType(null);
            }
        }

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(?int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
