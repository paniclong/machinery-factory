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
        return \random_int(
            $this->specification->getCarMaxSpeed()->getMin(),
            $this->specification->getCarMaxSpeed()->getMax()
        );
    }
}
