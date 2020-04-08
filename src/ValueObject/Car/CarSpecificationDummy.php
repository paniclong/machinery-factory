<?php

namespace App\ValueObject\Car;

use App\ValueObject\Car\Specifications\Fuel;
use App\ValueObject\Car\Specifications\FuelConsumption;
use App\ValueObject\Car\Specifications\Gear;
use App\ValueObject\Car\Specifications\Horsepower;
use App\ValueObject\Car\Specifications\MaxSpeed;
use App\ValueObject\Car\Specifications\Torque;

class CarSpecificationDummy
{
    /**
     * @var MaxSpeed
     */
    private $maxSpeed;

    /**
     * @var Fuel
     */
    private $fuel;

    /**
     * @var Torque
     */
    private $torque;

    /**
     * @var Horsepower
     */
    private $horsepower;

    /**
     * @var FuelConsumption
     */
    private $fuelConsumption;

    /**
     * @var Gear
     */
    private $gear;

    /**
     * @param MaxSpeed $maxSpeed
     * @param Fuel $fuel
     * @param Torque $torque
     * @param Horsepower $horsepower
     * @param FuelConsumption $fuelConsumption
     * @param Gear $gear
     */
    public function __construct(
        MaxSpeed $maxSpeed,
        Fuel $fuel,
        Torque $torque,
        Horsepower $horsepower,
        FuelConsumption $fuelConsumption,
        Gear $gear
    ) {
        $this->maxSpeed = $maxSpeed;
        $this->fuel = $fuel;
        $this->torque = $torque;
        $this->horsepower = $horsepower;
        $this->fuelConsumption = $fuelConsumption;
        $this->gear = $gear;
    }

    /**
     * @return MaxSpeed
     */
    public function getMaxSpeed(): MaxSpeed
    {
        return $this->maxSpeed;
    }

    /**
     * @return Fuel
     */
    public function getFuel(): Fuel
    {
        return $this->fuel;
    }

    /**
     * @return Torque
     */
    public function getTorque(): Torque
    {
        return $this->torque;
    }

    /**
     * @return Horsepower
     */
    public function getHorsepower(): Horsepower
    {
        return $this->horsepower;
    }

    /**
     * @return FuelConsumption
     */
    public function getFuelConsumption(): FuelConsumption
    {
        return $this->fuelConsumption;
    }

    /**
     * @return Gear
     */
    public function getGear(): Gear
    {
        return $this->gear;
    }
}
