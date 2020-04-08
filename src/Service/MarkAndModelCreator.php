<?php

namespace App\Service;

use App\Entity\CarMark;
use App\Entity\CarMarkModel;
use App\Entity\CarModel;
use App\Repository\CarMarkRepository;
use App\Repository\CarModelRepository;

class MarkAndModelCreator
{
    /**
     * @var CarMarkRepository
     */
    private $carMarkRepository;

    /**
     * @var CarModelRepository
     */
    private $carModelRepository;

    /**
     * @param CarMarkRepository $carMarkRepository
     * @param CarModelRepository $carModelRepository
     */
    public function __construct(CarMarkRepository $carMarkRepository, CarModelRepository $carModelRepository)
    {
        $this->carMarkRepository = $carMarkRepository;
        $this->carModelRepository = $carModelRepository;
    }

    /**
     * @return CarMarkModel
     *
     * @throws \Exception
     */
    public function make(): CarMarkModel
    {
        $markIds = [];
        $modelIds = [];

        foreach ($this->carMarkRepository->findAllIds() as $markId) {
            $markIds[] = \reset($markId);
        }

        foreach ($this->carModelRepository->findAllIds() as $modelId) {
            $modelIds[] = \reset($modelId);
        }

        $randomMark = \array_rand(\array_flip($markIds));
        $randomModel = \array_rand(\array_flip($modelIds));

        $carMarkModel = new CarMarkModel();

        /** @var CarMark $carMark */
        $carMark = $this->carMarkRepository->find($randomMark);
        /** @var CarModel $carModel */
        $carModel = $this->carModelRepository->find($randomModel);

        if (null === $carMark || null === $carModel) {
            throw new \Exception();
        }

        $carMarkModel
            ->setCarMark($carMark)
            ->setCarModel($carModel);

        return $carMarkModel;
    }
}
