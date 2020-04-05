<?php

namespace App\Utils\Specification;

class CarFuelGenerator extends AbstractSpecificationGenerator
{
    /**
     * @inheritDoc
     */
    public function handle(): string
    {
        $fuelType = $this->specification->getCarFuel()->getChoice();
        $key = \array_rand($fuelType);

        return $fuelType[$key];
    }
}
