<?php

namespace App\Service\Dummy\Generator\Car\Specifications;

class FuelDummyGenerator extends \App\Service\Dummy\Generator\Car\AbstractSpecificationDummyGenerator
{
    /**
     * @inheritDoc
     */
    public function handle(): string
    {
        $fuelType = $this->specification->getFuel()->getChoice();
        $key = \array_rand($fuelType);

        return $fuelType[$key];
    }
}
