<?php

namespace App\ValueObject;

use App\ValueObject\Detail\CarFuel;
use App\ValueObject\Detail\CarFuelConsumption;
use App\ValueObject\Detail\CarGear;
use App\ValueObject\Detail\CarHorsepower;
use App\ValueObject\Detail\CarMaxSpeed;
use App\ValueObject\Detail\CarTorque;

class Specification
{
    /**
     * @var CarMaxSpeed
     */
    private $carMaxSpeed;

    /**
     * @var CarFuel
     */
    private $carFuel;

    /**
     * @var CarTorque
     */
    private $carTorque;

    /**
     * @var CarHorsepower
     */
    private $carHorsepower;

    /**
     * @var CarFuelConsumption
     */
    private $carFuelConsumption;

    /**
     * @var CarGear
     */
    private $carGear;

    /**
     * @param CarMaxSpeed $carMaxSpeed
     * @param CarFuel $carFuel
     * @param CarTorque $carTorque
     * @param CarHorsepower $carHorsepower
     * @param CarFuelConsumption $carFuelConsumption
     * @param CarGear $carGear
     */
    public function __construct(
        CarMaxSpeed $carMaxSpeed,
        CarFuel $carFuel,
        CarTorque $carTorque,
        CarHorsepower $carHorsepower,
        CarFuelConsumption $carFuelConsumption,
        CarGear $carGear
    ) {
        $this->carMaxSpeed = $carMaxSpeed;
        $this->carFuel = $carFuel;
        $this->carTorque = $carTorque;
        $this->carHorsepower = $carHorsepower;
        $this->carFuelConsumption = $carFuelConsumption;
        $this->carGear = $carGear;
    }

    /**
     * @return CarMaxSpeed
     */
    public function getCarMaxSpeed(): CarMaxSpeed
    {
        return $this->carMaxSpeed;
    }

    /**
     * @return CarFuel
     */
    public function getCarFuel(): CarFuel
    {
        return $this->carFuel;
    }

    /**
     * @return CarTorque
     */
    public function getCarTorque(): CarTorque
    {
        return $this->carTorque;
    }

    /**
     * @return CarHorsepower
     */
    public function getCarHorsepower(): CarHorsepower
    {
        return $this->carHorsepower;
    }

    /**
     * @return CarFuelConsumption
     */
    public function getCarFuelConsumption(): CarFuelConsumption
    {
        return $this->carFuelConsumption;
    }

    /**
     * @return CarGear
     */
    public function getCarGear(): CarGear
    {
        return $this->carGear;
    }
}
