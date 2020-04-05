<?php

namespace App\Service\Builder;

use App\Service\Generator\CarVINGenerator;

class CarVINBuilder implements CarBuilderInterface
{
    /**
     * @var CarVINGenerator
     */
    private $generator;

    /**
     * @param CarVINGenerator $generator
     */
    public function __construct(CarVINGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function build(): string
    {
        return $this->generator->generate();
    }
}
