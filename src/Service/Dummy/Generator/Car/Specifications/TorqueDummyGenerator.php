<?php

namespace App\Service\Dummy\Generator\Car\Specifications;

class TorqueDummyGenerator extends \App\Service\Dummy\Generator\Car\AbstractSpecificationDummyGenerator
{
    /**
     * @inheritDoc
     *
     * @throws \Exception
     */
    public function handle(): int
    {
        return \random_int(
            $this->specification->getTorque()->getMin(),
            $this->specification->getTorque()->getMax()
        );
    }
}
