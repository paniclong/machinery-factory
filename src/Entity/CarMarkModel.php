<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarMarkModelRepository")
 */
class CarMarkModel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarMark")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carMark;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarModel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carModel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarMark(): ?CarMark
    {
        return $this->carMark;
    }

    public function setCarMark(?CarMark $carMark): self
    {
        $this->carMark = $carMark;

        return $this;
    }

    public function getCarModel(): ?CarModel
    {
        return $this->carModel;
    }

    public function setCarModel(?CarModel $carModel): self
    {
        $this->carModel = $carModel;

        return $this;
    }
}
