<?php

namespace App\Factory\Dummy\Car;

use App\ValueObject\Car\CarEngineDummy;

class EngineDummyFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return CarEngineDummy
     */
    public function from(array $data): CarEngineDummy
    {
        return new CarEngineDummy($data['prefix'], $data['length']);
    }
}
