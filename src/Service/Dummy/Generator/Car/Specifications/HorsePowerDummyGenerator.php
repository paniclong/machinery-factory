<?php

namespace App\Service\Dummy\Generator\Car\Specifications;

class HorsePowerDummyGenerator extends \App\Service\Dummy\Generator\Car\AbstractSpecificationDummyGenerator
{
    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function handle()
    {
        return \random_int(
            $this->specification->getHorsepower()->getMin(),
            $this->specification->getHorsepower()->getMax()
        );
    }
}
