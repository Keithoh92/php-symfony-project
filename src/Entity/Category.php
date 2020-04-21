<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Auction", mappedBy="category")
     */
    private $auctions;

    public function __construct()
    {
        $this->auctions = new ArrayCollection();
    }

//    private
//    public function __construct()
//    {
//        $this->GoTo = new ArrayCollection();
//    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }


//    /**
//     * @return Collection|Auction[]
//     */
//    public function getGoTo(): Collection
//    {
//        return $this->GoTo;
//    }
//
//    public function addGoTo(Auction $goTo): self
//    {
//        if (!$this->GoTo->contains($goTo)) {
//            $this->GoTo[] = $goTo;
//            $goTo->setCategory($this);
//        }
//
//        return $this;
//    }
//
//    public function removeGoTo(Auction $goTo): self
//    {
//        if ($this->GoTo->contains($goTo)) {
//            $this->GoTo->removeElement($goTo);
//            // set the owning side to null (unless already changed)
//            if ($goTo->getCategory() === $this) {
//                $goTo->setCategory(null);
//            }
//        }
//
//        return $this;
//    }

    public function getAuctions(): Collection
    {
        return $this->auctions;
    }

    public function __toString()
    {
        return $this->title;    // TODO: Implement __toString() method.

    }
}
