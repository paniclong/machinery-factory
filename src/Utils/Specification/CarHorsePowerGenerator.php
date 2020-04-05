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
        return \random_int(
            $this->specification->getCarHorsepower()->getMin(),
            $this->specification->getCarHorsepower()->getMax()
        );
    }
}
