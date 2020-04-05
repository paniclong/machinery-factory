<?php

namespace App\Factory;

use App\ValueObject\Chassis;

class CarChassisFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Chassis
     */
    public function from(array $data): Chassis
    {
        $prefix = $data['prefix'];
        $length = $data['length'];

        return new Chassis($prefix, $length);
    }
}
