<?php

namespace App\Factory\Dummy\Car;

interface FactoryInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function from(array $data);
}
