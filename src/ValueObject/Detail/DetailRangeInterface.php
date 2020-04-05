<?php

namespace App\ValueObject\Detail;

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
