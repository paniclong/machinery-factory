<?php

namespace App\Service\Generator;

use App\Factory\CarVINFactory;
use App\Service\Config\CarConfigService;

class CarVINGenerator
{
    /**
     * @var CarConfigService
     */
    private $configLoader;

    /**
     * @var CarVINFactory
     */
    private $factory;

    /**
     * @param CarConfigService $configLoader
     * @param CarVINFactory $factory
     */
    public function __construct(CarConfigService $configLoader, CarVINFactory $factory)
    {
        $this->configLoader = $configLoader;
        $this->factory = $factory;
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        $carDetail = $this->configLoader->getCarDetail();
        $carEngine = $this->factory->from($carDetail['vin']);

        /** @noinspection NonSecureUniqidUsageInspection */
        $unique = \md5(\uniqid());

        return $carEngine->getPrefix() . \substr($unique, 0, $carEngine->getLength());
    }
}
