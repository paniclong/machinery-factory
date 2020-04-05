<?php

namespace App\Utils\Specification;

class CarMaxSpeedGenerator extends AbstractSpecificationGenerator
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
            $specification->getCarMaxSpeed()->getMin(),
            $specification->getCarMaxSpeed()->getMax()
        );
    }
}
