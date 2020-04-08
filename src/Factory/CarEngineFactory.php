<?php

namespace App\Factory;

use App\ValueObject\Engine;

class CarEngineFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Engine
     */
    public function from(array $data): Engine
    {
        return new Engine($data['prefix'], $data['length']);
    }
}
