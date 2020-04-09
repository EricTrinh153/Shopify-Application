<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductlistRepository")
 */
class Productlist
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active_status;

    /**
     * @ORM\Column(type="text")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryID;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\unit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unitID;

    public function getId(): ?string
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

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

    public function getActiveStatus(): ?bool
    {
        return $this->active_status;
    }

    public function setActiveStatus(bool $active_status): self
    {
        $this->active_status = $active_status;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCategoryID(): ?category
    {
        return $this->categoryID;
    }

    public function setCategoryID(?category $categoryID): self
    {
        $this->categoryID = $categoryID;

        return $this;
    }

    public function getUnitID(): ?unit
    {
        return $this->unitID;
    }

    public function setUnitID(?unit $unitID): self
    {
        $this->unitID = $unitID;

        return $this;
    }
}
