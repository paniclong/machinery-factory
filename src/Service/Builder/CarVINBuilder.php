<?php

namespace App\Service\Builder;

use App\Service\Dummy\Generator\Car\VINDummyGenerator;

class CarVINBuilder implements CarBuilderInterface
{
    /**
     * @var VINDummyGenerator
     */
    private $generator;

    /**
     * @param VINDummyGenerator $generator
     */
    public function __construct(VINDummyGenerator $generator)
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
