<?php

namespace App\ValueObject\Car\Specifications;

class Gear implements DetailChoiceInterface
{
    /**
     * @var array
     */
    private $choice;

    /**
     * @param array $choice
     */
    public function __construct(array $choice)
    {
        $this->choice = $choice;
    }

    /**
     * @inheritDoc
     */
    public function getChoice(): array
    {
        return $this->choice;
    }
}
