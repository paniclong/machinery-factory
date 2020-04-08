<?php

namespace App\Factory\Dummy\Car;

use App\ValueObject\Car\CarVINDummy;

class VINDummyFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return CarVINDummy
     */
    public function from(array $data): CarVINDummy
    {
        return new CarVINDummy($data['prefix'], $data['length']);
    }
}
