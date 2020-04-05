<?php

namespace App\Service\Builder;

use App\Entity\CarChassis;
use App\Service\Generator\CarChassisGenerator;

class CarChassisBuilder implements CarBuilderInterface
{
    /**
     * @var CarChassisGenerator
     */
    private $generator;

    /**
     * @param CarChassisGenerator $generator
     */
    public function __construct(CarChassisGenerator $generator)
    {
        $this->generator = $generator;
    }
    /**
     * @return CarChassis
     *
     * @throws \Exception
     */
    public function build(): CarChassis
    {
        $carChassis = new CarChassis();

        $carChassis->setCode($this->generator->generate());

        return $carChassis;
    }
}
