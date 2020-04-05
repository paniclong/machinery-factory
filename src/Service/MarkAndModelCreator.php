<?php

namespace App\Service;

use App\Entity\CarMark;
use App\Entity\CarMarkModel;
use App\Entity\CarModel;
use Doctrine\ORM\EntityManagerInterface;

class MarkAndModelCreator
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return CarMarkModel
     *
     * @throws \Exception
     */
    public function make(): CarMarkModel
    {
        $carMarkRepository = $this->entityManager->getRepository(CarMark::class);
        $carModelRepository = $this->entityManager->getRepository(CarModel::class);

        $count = \count($carMarkRepository->findAll());
        $randomMark = \random_int(1, $count);

        $count = \count($carModelRepository->findAll());
        $randomModel = \random_int(1, $count);

        $carMarkModel = new CarMarkModel();

        /** @var CarMark $carMark */
        $carMark = $carMarkRepository->find($randomMark);
        /** @var CarModel $carModel */
        $carModel = $carModelRepository->find($randomModel);

        if (null === $carMark || null === $carModel) {
            throw new \Exception();
        }

        $carMarkModel
            ->setCarMark($carMark)
            ->setCarModel($carModel);

        return $carMarkModel;
    }
}
