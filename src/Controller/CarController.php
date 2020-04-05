<?php

namespace App\Controller;

use App\Entity\Car;
use App\Service\CarCreator;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
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
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param CarCreator $carCreator
     * @param EntityManagerInterface $entityManager
     * @param LoggerInterface $logger
     */
    public function __construct(
        CarCreator $carCreator,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    ) {
        $this->carCreator = $carCreator;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    /**
     * @Route(
     *     "/api/cars/create",
     *     name="create_car",
     *     methods={"GET"}
     * )
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function create(): ?\Symfony\Component\HttpFoundation\Response
    {
        try {
            $car = $this->carCreator->make();

            $this->entityManager->persist($car);
            $this->entityManager->flush();

            return new \Symfony\Component\HttpFoundation\Response(
                \json_encode(['id' => $car->getId()]),
                \Symfony\Component\HttpFoundation\Response::HTTP_OK
            );
        } catch (\Throwable $ex) {
            $this->logger->error(
                __CLASS__ . '::' . __METHOD__,
                [
                    'message' => $ex->getMessage(),
                    'traceAsString' => $ex->getTraceAsString(),
                ]
            );

            return null;
        }
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

        return $this->render(
            'car.twig',
            ['cars' => $carRepository->findAll()]
        );
    }
}
