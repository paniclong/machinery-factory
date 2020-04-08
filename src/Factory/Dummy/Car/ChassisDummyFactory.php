<?php

namespace App\Factory\Dummy\Car;

use App\ValueObject\Car\CarChassisDummy;

class ChassisDummyFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return CarChassisDummy
     */
    public function from(array $data): CarChassisDummy
    {
        return new CarChassisDummy($data['prefix'], $data['length']);
    }
}
