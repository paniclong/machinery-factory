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
        $torque = $data['torque'];
        $horsepower = $data['horsepower'];
        $fuelConsumption = $data['fuel_consumption'];

        return new Specification(
            new CarMaxSpeed($maxSpeed['min'], $maxSpeed['max']),
            new CarFuel($data['fuel']),
            new CarTorque($torque['min'], $torque['max']),
            new CarHorsepower($horsepower['min'], $horsepower['max']),
            new CarFuelConsumption($fuelConsumption['min'], $fuelConsumption['max']),
            new CarGear($data['gear'])
        );
    }
}
