<?php

namespace App\Service\Builder;

use App\Entity\CarSpecifications;
use App\Service\Dummy\Generator\Car\SpecificationDummyGenerator;
use App\ValueObject\Car\Specifications\Fuel;
use App\ValueObject\Car\Specifications\FuelConsumption;
use App\ValueObject\Car\Specifications\Gear;
use App\ValueObject\Car\Specifications\Horsepower;
use App\ValueObject\Car\Specifications\MaxSpeed;
use App\ValueObject\Car\Specifications\Torque;

class CarSpecificationBuilder implements CarBuilderInterface
{
    /**
     * @var SpecificationDummyGenerator
     */
    private $generator;

    /**
     * @param SpecificationDummyGenerator $generator
     */
    public function __construct(SpecificationDummyGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @return CarSpecifications
     *
     * @throws \Exception
     */
    public function build(): CarSpecifications
    {
        $result = $this->generator->generate();

        $carSpecification = new CarSpecifications();

        return $carSpecification
            ->setTorque($result[Torque::class])
            ->setFuel($result[Fuel::class])
            ->setMaxSpeed($result[MaxSpeed::class])
            ->setHorsepower($result[Horsepower::class])
            ->setFuelConsumption($result[FuelConsumption::class])
            ->setGear($result[Gear::class]);
    }
}
