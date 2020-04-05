<?php

namespace App\Utils\Specification;

class CarGearGenerator extends AbstractSpecificationGenerator
{
    /**
     * @inheritDoc
     */
    public function handle()
    {
        $gearType = $this->specification->getCarGear()->getChoice();
        $key = \array_rand($gearType);

        return $gearType[$key];
    }
}
