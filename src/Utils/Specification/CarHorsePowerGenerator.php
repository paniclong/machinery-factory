<?php

namespace App\Utils\Specification;

class CarHorsePowerGenerator extends AbstractSpecificationGenerator
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
            $specification->getCarHorsepower()->getMin(),
            $specification->getCarHorsepower()->getMax()
        );
    }
}
