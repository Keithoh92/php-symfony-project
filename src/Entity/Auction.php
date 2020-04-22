<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AuctionRepository")
 */
class Auction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $item;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="GoTo")
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItem(): ?string
    {
        return $this->item;
    }

    public function setItem(string $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }


    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category = null)
    {
        $this->category = $category;

        return $this;
    }
    private $auctions;

//    /**
//     * @ORM\ManyToOne(targetEntity="App\Entity\Bids", inversedBy="auctions")
//     */
//    private $Bids;

    /**
     * @ORM\Column(type="integer")
     */
    private $currentBid;

//    /**
//     * @ORM\Column(type="datetime")
//     */
//    private $Status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDateTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $completed;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deadline;

    public function getCurrentBid(): ?int
    {
        return $this->currentBid;
    }

    public function setCurrentBid(int $currentBid): self
    {
        $this->currentBid = $currentBid;

        return $this;
    }

    public function __construct()
    {
        $this->auctions = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->id . ': ' . $this->getItem();   // TODO: Implement __toString() method.
    }


public function getStartDateTime(): ?\DateTimeInterface
{
    return $this->startDateTime;
}

public function setStartDateTime(\DateTimeInterface $startDateTime): self
{
    $this->startDateTime = $startDateTime;

    return $this;
}

public function getCompleted(): ?bool
{
    return $this->completed;
}

public function setCompleted(bool $completed): self
{
    $this->completed = $completed;

    return $this;
}

public function getDeadline(): ?\DateTimeInterface
{
    return $this->deadline;
}

public function setDeadline(\DateTimeInterface $deadline): self
{
    $this->deadline = $deadline;

    return $this;
}}
