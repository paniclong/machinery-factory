<?php

namespace App\Utils\Specification;

class CarGearGenerator extends AbstractSpecificationGenerator
{
    /**
     * @inheritDoc
     */
    public function handle()
    {
        $specification = $this->getSpecification();

        $gearType = $specification->getCarGear()->getChoice();
        $key = \array_rand($gearType);

        return $gearType[$key];
    }
}
