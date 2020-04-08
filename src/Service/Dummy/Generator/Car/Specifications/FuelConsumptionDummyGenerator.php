<?php

namespace App\Service\Dummy\Generator\Car\Specifications;

class FuelConsumptionDummyGenerator extends \App\Service\Dummy\Generator\Car\AbstractSpecificationDummyGenerator
{
    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function handle()
    {
        return \random_int(
            $this->specification->getFuelConsumption()->getMin(),
            $this->specification->getFuelConsumption()->getMax()
        );
    }
}
