<?php

namespace App\Service\Builder;

use App\Entity\CarSpecifications;
use App\Service\Generator\CarSpecificationGenerator;
use App\ValueObject\Detail\CarFuel;
use App\ValueObject\Detail\CarFuelConsumption;
use App\ValueObject\Detail\CarGear;
use App\ValueObject\Detail\CarHorsepower;
use App\ValueObject\Detail\CarMaxSpeed;
use App\ValueObject\Detail\CarTorque;

class CarSpecificationBuilder implements CarBuilderInterface
{
    /**
     * @var CarSpecificationGenerator
     */
    private $generator;

    /**
     * @param CarSpecificationGenerator $generator
     */
    public function __construct(CarSpecificationGenerator $generator)
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
            ->setTorque($result[CarTorque::class])
            ->setFuel($result[CarFuel::class])
            ->setMaxSpeed($result[CarMaxSpeed::class])
            ->setHorsepower($result[CarHorsepower::class])
            ->setFuelConsumption($result[CarFuelConsumption::class])
            ->setGear($result[CarGear::class]);
    }
}
