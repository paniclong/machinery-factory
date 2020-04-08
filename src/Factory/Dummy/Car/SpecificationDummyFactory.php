<?php

namespace App\Factory\Dummy\Car;

use App\ValueObject\Car\Specifications\Fuel;
use App\ValueObject\Car\Specifications\FuelConsumption;
use App\ValueObject\Car\Specifications\Gear;
use App\ValueObject\Car\Specifications\Horsepower;
use App\ValueObject\Car\Specifications\MaxSpeed;
use App\ValueObject\Car\Specifications\Torque;
use App\ValueObject\Car\CarSpecificationDummy;

class SpecificationDummyFactory
{
    /**
     * @param array $data
     *
     * @return CarSpecificationDummy
     */
    public function from(array $data): CarSpecificationDummy
    {
        $maxSpeed = $data['max_speed'];
        $torque = $data['torque'];
        $horsepower = $data['horsepower'];
        $fuelConsumption = $data['fuel_consumption'];

        return new CarSpecificationDummy(
            new MaxSpeed($maxSpeed['min'], $maxSpeed['max']),
            new Fuel($data['fuel']),
            new Torque($torque['min'], $torque['max']),
            new Horsepower($horsepower['min'], $horsepower['max']),
            new FuelConsumption($fuelConsumption['min'], $fuelConsumption['max']),
            new Gear($data['gear'])
        );
    }
}
