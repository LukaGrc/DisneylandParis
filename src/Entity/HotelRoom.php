<?php

namespace App\Entity;

use App\Entity\Hotel;
use App\Repository\HotelRoomRepository;
use DateTime;
use DateInterval;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Book;

#[ORM\Entity(repositoryClass: HotelRoomRepository::class)]
class HotelRoom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?hotel $hotel = null;

    #[ORM\Column(length: 255)]
    private ?string $number = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    private ?HotelRoomType $type = null;

    #[ORM\OneToMany(mappedBy: 'room', targetEntity: Book::class)]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
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

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getType(): ?HotelRoomType
    {
        return $this->type;
    }

    public function setType(?HotelRoomType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->setRoom($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getRoom() === $this) {
                $book->setRoom(null);
            }
        }

        return $this;
    }


    public function isAvailable(DateTime $date): bool
    {
        $books = $this->getBooks();
        foreach ($books as $book) {
            if ($book->getDateStart() <= $date && $book->getDateEnd() >= $date) {
                return false;
            }
        }
        return true;
    }

    public function isAvailableForPeriod(DateTime $startDate, DateTime $endDate): bool
    {
        $interval = DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($startDate, $interval, $endDate);
        
        foreach ($period as $date) {
            if (!$this->isAvailable($date)) {
                return false;
            }
        }

        return true;
    }
}
