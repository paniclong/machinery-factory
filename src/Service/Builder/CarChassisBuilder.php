<?php

namespace App\Service\Builder;

use App\Entity\CarChassis;
use App\Service\Dummy\Generator\Car\ChassisDummyGenerator;

class CarChassisBuilder implements CarBuilderInterface
{
    /**
     * @var ChassisDummyGenerator
     */
    private $generator;

    /**
     * @param ChassisDummyGenerator $generator
     */
    public function __construct(ChassisDummyGenerator $generator)
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
        return (new CarChassis())->setCode($this->generator->generate());
    }
}
