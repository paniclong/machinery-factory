<?php

namespace App\Factory;

interface FactoryInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function from(array $data);
}
