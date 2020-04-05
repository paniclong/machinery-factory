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
        $specification = $this->getSpecification();

        return \random_int(
            $specification->getCarTorque()->getMin(),
            $specification->getCarTorque()->getMax()
        );
    }
}
