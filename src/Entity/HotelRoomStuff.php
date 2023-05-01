<?php

namespace App\Entity;

use App\Repository\HotelRoomStuffRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRoomStuffRepository::class)]
class HotelRoomStuff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: HotelRoomType::class, inversedBy: 'Stuffs')]
    private Collection $romm_type;

    public function __construct()
    {
        $this->romm_type = new ArrayCollection();
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

    /**
     * @return Collection<int, HotelRoomType>
     */
    public function getRommType(): Collection
    {
        return $this->romm_type;
    }

    public function addRommType(HotelRoomType $rommType): self
    {
        if (!$this->romm_type->contains($rommType)) {
            $this->romm_type->add($rommType);
        }

        return $this;
    }

    public function removeRommType(HotelRoomType $rommType): self
    {
        $this->romm_type->removeElement($rommType);

        return $this;
    }
}
