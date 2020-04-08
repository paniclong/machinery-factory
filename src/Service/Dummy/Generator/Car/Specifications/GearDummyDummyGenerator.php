<?php

namespace App\Service\Dummy\Generator\Car\Specifications;

class GearDummyDummyGenerator extends \App\Service\Dummy\Generator\Car\AbstractSpecificationDummyGenerator
{
    /**
     * @inheritDoc
     */
    public function handle()
    {
        $gearType = $this->specification->getGear()->getChoice();
        $key = \array_rand($gearType);

        return $gearType[$key];
    }
}
