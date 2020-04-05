<?php

namespace App\Utils\Specification;

class CarTorqueGenerator extends AbstractSpecificationGenerator
{
    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function handle(): int
    {
        return \random_int(
            $this->specification->getCarTorque()->getMin(),
            $this->specification->getCarTorque()->getMax()
        );
    }
}
