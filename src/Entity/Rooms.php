<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rooms
 *
 * @ORM\Table(name="rooms")
 * @ORM\Entity
 */
class Rooms
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stay_date", type="date", nullable=false)
     */
    private $stayDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="room_nights", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $roomNights = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="room_revenues", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $roomRevenues = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="adults", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $adults = NULL;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStayDate(): ?\DateTimeInterface
    {
        return $this->stayDate;
    }

    public function setStayDate(\DateTimeInterface $stayDate): self
    {
        $this->stayDate = $stayDate;

        return $this;
    }

    public function getRoomNights(): ?int
    {
        return $this->roomNights;
    }

    public function setRoomNights(?int $roomNights): self
    {
        $this->roomNights = $roomNights;

        return $this;
    }

    public function getRoomRevenues(): ?int
    {
        return $this->roomRevenues;
    }

    public function setRoomRevenues(?int $roomRevenues): self
    {
        $this->roomRevenues = $roomRevenues;

        return $this;
    }

    public function getAdults(): ?int
    {
        return $this->adults;
    }

    public function setAdults(?int $adults): self
    {
        $this->adults = $adults;

        return $this;
    }


}
