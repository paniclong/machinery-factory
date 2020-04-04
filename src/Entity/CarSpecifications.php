<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarSpecificationsRepository")
 */
class CarSpecifications
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $maxSpeed;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $fuel;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $torque;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $horsepower;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $fuelConsumption;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $gear;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxSpeed(): ?string
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed(string $maxSpeed): self
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getTorque(): ?string
    {
        return $this->torque;
    }

    public function setTorque(string $torque): self
    {
        $this->torque = $torque;

        return $this;
    }

    public function getHorsepower(): ?string
    {
        return $this->horsepower;
    }

    public function setHorsepower(string $horsepower): self
    {
        $this->horsepower = $horsepower;

        return $this;
    }

    public function getFuelConsumption(): ?string
    {
        return $this->fuelConsumption;
    }

    public function setFuelConsumption(string $fuelConsumption): self
    {
        $this->fuelConsumption = $fuelConsumption;

        return $this;
    }

    public function getGear(): ?string
    {
        return $this->gear;
    }

    public function setGear(string $gear): self
    {
        $this->gear = $gear;

        return $this;
    }
}
