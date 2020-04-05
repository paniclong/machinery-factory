<?php

namespace App\Utils\Specification;

class CarFuelConsumptionGenerator extends AbstractSpecificationGenerator
{
    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function handle()
    {
        return \random_int(
            $this->specification->getCarFuelConsumption()->getMin(),
            $this->specification->getCarFuelConsumption()->getMax()
        );
    }
}
