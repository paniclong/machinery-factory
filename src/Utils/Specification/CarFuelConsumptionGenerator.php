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
        $specification = $this->getSpecification();

        return \random_int(
            $specification->getCarFuelConsumption()->getMin(),
            $specification->getCarFuelConsumption()->getMax()
        );
    }
}
