<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?int $stars = null;

    #[ORM\OneToOne(mappedBy: 'hotel', cascade: ['persist', 'remove'])]
    private ?HotelTravelTime $hotelTravelTime = null;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: Restaurant::class)]
    private Collection $restaurants;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: HotelRoom::class, orphanRemoval: true)]
    private Collection $rooms;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: HotelRoomType::class, orphanRemoval: true)]
    private Collection $RoomTypes;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $banner = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $video = null;

    public function __construct()
    {
        $this->restaurants = new ArrayCollection();
        $this->rooms = new ArrayCollection();
        $this->RoomTypes = new ArrayCollection();
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

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(int $stars): self
    {
        $this->stars = $stars;

        return $this;
    }

    public function getHotelTravelTime(): ?HotelTravelTime
    {
        return $this->hotelTravelTime;
    }

    public function setHotelTravelTime(HotelTravelTime $hotelTravelTime): self
    {
        // set the owning side of the relation if necessary
        if ($hotelTravelTime->getHotel() !== $this) {
            $hotelTravelTime->setHotel($this);
        }

        $this->hotelTravelTime = $hotelTravelTime;

        return $this;
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
            $restaurant->setHotel($this);
        }

        return $this;
    }

    public function removeRestaurant(Restaurant $restaurant): self
    {
        if ($this->restaurants->removeElement($restaurant)) {
            // set the owning side to null (unless already changed)
            if ($restaurant->getHotel() === $this) {
                $restaurant->setHotel(null);
            }
        }

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
            $room->setHotel($this);
        }

        return $this;
    }

    public function removeRoom(HotelRoom $room): self
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getHotel() === $this) {
                $room->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, HotelRoomType>
     */
    public function getRoomTypes(): Collection
    {
        return $this->RoomTypes;
    }

    public function addRoomType(HotelRoomType $roomType): self
    {
        if (!$this->RoomTypes->contains($roomType)) {
            $this->RoomTypes->add($roomType);
            $roomType->setHotel($this);
        }

        return $this;
    }

    public function removeRoomType(HotelRoomType $roomType): self
    {
        if ($this->RoomTypes->removeElement($roomType)) {
            // set the owning side to null (unless already changed)
            if ($roomType->getHotel() === $this) {
                $roomType->setHotel(null);
            }
        }

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getRoomTypesAvailable(DateTime $date, int $people): array
    {
        $res = [];

        foreach ($this->getRoomTypes() as $roomType) {
            if ($roomType->getCapacity() >= $people) {
                if (count($roomType->getAvailableRooms($date)) > 0) {
                    $res[] = $roomType;
                }
            }
        }

        return $res;
    }

    public function getRoomTypesAvailableForPeriod(DateTime $start, DateTime $end, int $people): array
    {
        $res = [];

        foreach ($this->getRoomTypes() as $roomType) {
            if ($roomType->getCapacity() >= $people) {
                if (count($roomType->getAvailableRoomsForPeriod($start, $end)) > 0) {
                    $res[] = $roomType;
                }
            }
        }

        return $res;
    }

}
