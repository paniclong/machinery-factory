<?php

namespace App\Service;

use App\Entity\Car;
use App\Service\Builder\CarChassisBuilder;
use App\Service\Builder\CarEngineBuilder;
use App\Service\Builder\CarSpecificationBuilder;
use App\Service\Builder\CarVINBuilder;
use Doctrine\ORM\EntityManagerInterface;

class CarCreator
{
    /**
     * @var CarSpecificationBuilder
     */
    private $specificationBuilder;

    /**
     * @var CarEngineBuilder
     */
    private $engineBuilder;

    /**
     * @var CarVINBuilder
     */
    private $carVINBuilder;

    /**
     * @var CarChassisBuilder
     */
    private $carChassisBuilder;

    /**
     * @var ColorSelector
     */
    private $colorSelector;

    /**
     * @var MarkAndModelCreator
     */
    private $markAndModelCreator;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param CarSpecificationBuilder $specificationBuilder
     * @param CarEngineBuilder $engineBuilder
     * @param CarVINBuilder $carVINBuilder
     * @param CarChassisBuilder $carChassisBuilder
     * @param ColorSelector $colorSelector
     * @param MarkAndModelCreator $markAndModelCreator
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        CarSpecificationBuilder $specificationBuilder,
        CarEngineBuilder $engineBuilder,
        CarVINBuilder $carVINBuilder,
        CarChassisBuilder $carChassisBuilder,
        ColorSelector $colorSelector,
        MarkAndModelCreator $markAndModelCreator,
        EntityManagerInterface $entityManager
    ) {
        $this->specificationBuilder = $specificationBuilder;
        $this->engineBuilder = $engineBuilder;
        $this->carVINBuilder = $carVINBuilder;
        $this->carChassisBuilder = $carChassisBuilder;
        $this->colorSelector = $colorSelector;
        $this->markAndModelCreator = $markAndModelCreator;
        $this->entityManager = $entityManager;
    }

    /**
     * @throws \Exception
     */
    public function make(): Car
    {
        $specification = $this->specificationBuilder->build();
        $engine = $this->engineBuilder->build();
        $chassis = $this->carChassisBuilder->build();
        $vin = $this->carVINBuilder->build();
        $color = $this->colorSelector->get();
        $markModel = $this->markAndModelCreator->make();

        $this->entityManager->persist($specification);
        $this->entityManager->persist($engine);
        $this->entityManager->persist($color);
        $this->entityManager->persist($chassis);
        $this->entityManager->persist($markModel);

        $car = new Car();

        $car
            ->setVin($vin)
            ->setSpecifications($specification)
            ->setEngine($engine)
            ->setColor($color)
            ->setChassis($chassis)
            ->setMarkModel($markModel)
            ->setDateCreate(new \DateTime());

        return $car;
    }
}
