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
        $prefix = $data['prefix'];
        $length = $data['length'];

        return new Engine($prefix, $length);
    }
}
