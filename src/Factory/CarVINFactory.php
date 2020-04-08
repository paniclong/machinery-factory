<?php

namespace App\Factory;

use App\ValueObject\VIN;

class CarVINFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return VIN
     */
    public function from(array $data): VIN
    {
        return new VIN($data['prefix'], $data['length']);
    }
}
