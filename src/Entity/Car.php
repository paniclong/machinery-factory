<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarMarkModel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $markModel;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $vin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarColor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarEngine")
     * @ORM\JoinColumn(nullable=false)
     */
    private $engine;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarChassis")
     */
    private $chassis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarSpecifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specifications;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarkModel(): ?CarMarkModel
    {
        return $this->markModel;
    }

    public function setMarkModel(?CarMarkModel $markModel): self
    {
        $this->markModel = $markModel;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getColor(): ?CarColor
    {
        return $this->color;
    }

    public function setColor(?CarColor $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getEngine(): ?CarEngine
    {
        return $this->engine;
    }

    public function setEngine(?CarEngine $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    public function getChassis(): ?CarChassis
    {
        return $this->chassis;
    }

    public function setChassis(?CarChassis $chassis): self
    {
        $this->chassis = $chassis;

        return $this;
    }

    public function getSpecifications(): ?CarSpecifications
    {
        return $this->specifications;
    }

    public function setSpecifications(?CarSpecifications $specifications): self
    {
        $this->specifications = $specifications;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): self
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }
}
