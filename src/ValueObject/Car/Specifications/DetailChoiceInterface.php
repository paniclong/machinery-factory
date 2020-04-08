<?php

namespace App\ValueObject\Car\Specifications;

interface DetailChoiceInterface
{
    /**
     * @return array
     */
    public function getChoice(): array;
}
