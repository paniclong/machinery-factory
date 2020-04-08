<?php

namespace App\ValueObject\Car\Specifications;

interface DetailRangeInterface
{
    /**
     * @return int
     */
    public function getMin(): int;

    /**
     * @return int
     */
    public function getMax(): int;
}
