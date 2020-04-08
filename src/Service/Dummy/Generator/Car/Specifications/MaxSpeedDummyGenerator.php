<?php

namespace App\Service\Dummy\Generator\Car\Specifications;

class MaxSpeedDummyGenerator extends \App\Service\Dummy\Generator\Car\AbstractSpecificationDummyGenerator
{
    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function handle(): int
    {
        return \random_int(
            $this->specification->getMaxSpeed()->getMin(),
            $this->specification->getMaxSpeed()->getMax()
        );
    }
}
