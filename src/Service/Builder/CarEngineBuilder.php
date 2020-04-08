<?php

namespace App\Service\Builder;

use App\Entity\CarEngine;
use App\Service\Dummy\Generator\Car\EngineDummyGenerator;

class CarEngineBuilder implements CarBuilderInterface
{
    /**
     * @var EngineDummyGenerator
     */
    private $carEngineGenerator;

    /**
     * @param EngineDummyGenerator $carEngineGenerator
     */
    public function __construct(EngineDummyGenerator $carEngineGenerator)
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
