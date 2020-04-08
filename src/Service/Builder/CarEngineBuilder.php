<?php

namespace App\Service\Builder;

use App\Entity\CarEngine;
use App\Service\Generator\CarEngineGenerator;

class CarEngineBuilder implements CarBuilderInterface
{
    /**
     * @var CarEngineGenerator
     */
    private $carEngineGenerator;

    /**
     * @param CarEngineGenerator $carEngineGenerator
     */
    public function __construct(CarEngineGenerator $carEngineGenerator)
    {
        $this->carEngineGenerator = $carEngineGenerator;
    }

    /**
     * @return CarEngine
     *
     * @throws \Exception
     */
    public function build(): CarEngine
    {
        return (new CarEngine())->setCode($this->carEngineGenerator->generate());
    }
}
