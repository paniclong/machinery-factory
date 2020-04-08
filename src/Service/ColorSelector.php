<?php

namespace App\Service;

use App\Entity\CarColor;
use App\Repository\CarColorRepository;

class ColorSelector
{
    /**
     * @var CarColorRepository
     */
    private $repository;

    /**
     * @param CarColorRepository $repository
     */
    public function __construct(CarColorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return CarColor
     *
     * @throws \Exception
     */
    public function get(): CarColor
    {
        $colorIds = [];

        foreach ($this->repository->findAllIds() as $colorId) {
            $colorIds[] = \reset($colorId);
        }

        $randomColor = \array_rand(\array_flip($colorIds));

        /** @var CarColor $carColor */
        $carColor = $this->repository->find($randomColor);

        if (null === $carColor) {
            throw new \Exception();
        }

        return $carColor;
    }
}
