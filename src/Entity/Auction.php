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

//    public function getBids(): ?Bids
//    {
//        return $this->Bids;
//    }
//
//    public function setBids(?Bids $Bids): self
//    {
//        $this->Bids = $Bids;
//
//        return $this;
//    }
}
