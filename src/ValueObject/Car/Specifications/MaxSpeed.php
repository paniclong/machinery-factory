<?php

namespace App\ValueObject\Car\Specifications;

class MaxSpeed implements DetailRangeInterface
{
    /**
     * @var int
     */
    private $min;

    /**
     * @var int
     */
    private $max;

    /**
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @inheritDoc
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * @inheritDoc
     */
    public function getMax(): int
    {
        return $this->max;
    }
}
