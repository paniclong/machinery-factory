<?php

namespace App\Controller;

use App\Entity\Car;
use App\Service\CarCreator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

final class CarController extends AbstractController
{
    /**
     * @var CarCreator
     */
    private $carCreator;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param CarCreator $carCreator
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(CarCreator $carCreator, EntityManagerInterface $entityManager)
    {
        $this->carCreator = $carCreator;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route(
     *     "/api/cars/create",
     *     name="create_car",
     *     methods={"GET"}
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function create(): \Symfony\Component\HttpFoundation\Response
    {
        $car = $this->carCreator->make();

        $this->entityManager->persist($car);
        $this->entityManager->flush();

        return $this->render('base.html.twig');
    }

    /**
     * @Route(
     *     "/api/cars/",
     *     name="list_car",
     *     methods={"GET"}
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(): \Symfony\Component\HttpFoundation\Response
    {
        $carRepository = $this->entityManager->getRepository(Car::class);

        echo '<pre>';
        /** @var Car $car */
        foreach ($carRepository->findAll() as $car) {
            echo $car->getId() . PHP_EOL;
            echo $car->getVin() . PHP_EOL;
            echo $car->getColor()->getName() . PHP_EOL;
            echo $car->getChassis()->getCode() . PHP_EOL;
            echo $car->getEngine()->getCode() . PHP_EOL;
            echo $car->getDateCreate()->getTimestamp() . PHP_EOL;
            echo $car->getSpecifications()->getMaxSpeed() . PHP_EOL;
            echo $car->getSpecifications()->getGear() . PHP_EOL;
            echo $car->getSpecifications()->getFuel() . PHP_EOL;
        }

        echo '</pre>';

        return $this->render('base.html.twig');
    }
}
