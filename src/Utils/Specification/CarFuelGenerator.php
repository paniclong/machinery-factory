<?php

namespace App\Utils\Specification;

class CarFuelGenerator extends AbstractSpecificationGenerator
{
    /**
     * @inheritDoc
     */
    public function handle(): string
    {
        $specification = $this->getSpecification();

        $fuelType = $specification->getCarFuel()->getChoice();
        $key = \array_rand($fuelType);

        return $fuelType[$key];
    }
}
