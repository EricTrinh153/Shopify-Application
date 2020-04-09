<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnitRepository")
 */
class unit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $unit_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnitName(): ?string
    {
        return $this->unit_name;
    }

    public function setUnitName(string $unit_name): self
    {
        $this->unit_name = $unit_name;

        return $this;
    }
}
