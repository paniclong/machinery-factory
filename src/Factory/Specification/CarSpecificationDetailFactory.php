<?php

namespace App\Factory\Specification;

use App\ValueObject\Detail\CarFuel;
use App\ValueObject\Detail\CarFuelConsumption;
use App\ValueObject\Detail\CarGear;
use App\ValueObject\Detail\CarHorsepower;
use App\ValueObject\Detail\CarMaxSpeed;
use App\ValueObject\Detail\CarTorque;
use App\ValueObject\Specification;

class CarSpecificationDetailFactory
{
    /**
     * @param array $data
     *
     * @return Specification
     */
    public function from(array $data): Specification
    {
        $maxSpeed = $data['max_speed'];
        $carMaxSpeed = new CarMaxSpeed($maxSpeed['min'], $maxSpeed['max']);

        $fuel = $data['fuel'];
        $carFuel = new CarFuel($fuel);

        $torque = $data['torque'];
        $carTorque = new CarTorque($torque['min'], $torque['max']);

        $horsepower = $data['horsepower'];
        $carHorsepower = new CarHorsepower($horsepower['min'], $horsepower['max']);

        $fuelConsumption = $data['fuel_consumption'];
        $carFuelConsumption = new CarFuelConsumption($fuelConsumption['min'], $fuelConsumption['max']);

        $gear = $data['gear'];
        $carGear = new CarGear($gear);

        return new Specification(
            $carMaxSpeed,
            $carFuel,
            $carTorque,
            $carHorsepower,
            $carFuelConsumption,
            $carGear
        );
    }
}
