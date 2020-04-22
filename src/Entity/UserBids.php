<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserBidsRepository")
 */
class UserBids
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
    private $mybid;

    /**
     * @ORM\Column(type="integer")
     */
    private $currentbid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="previousBids")
     */
    private $bidder;

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

    public function getMybid(): ?int
    {
        return $this->mybid;
    }

    public function setMybid(int $mybid): self
    {
        $this->mybid = $mybid;

        return $this;
    }

    public function getCurrentbid(): ?int
    {
        return $this->currentbid;
    }

    public function setCurrentbid(int $currentbid): self
    {
        $this->currentbid = $currentbid;

        return $this;
    }

    public function getBidder(): ?User
    {
        return $this->bidder;
    }

    public function setBidder(?User $bidder): self
    {
        $this->bidder = $bidder;

        return $this;
    }
}
