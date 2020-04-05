<?php

namespace App\Service\Generator;

use App\Factory\CarChassisFactory;
use App\Service\Config\CarConfigService;

class CarChassisGenerator
{
    /**
     * @var CarConfigService
     */
    private $configLoader;

    /**
     * @var CarChassisFactory
     */
    private $factory;

    /**
     * @param CarConfigService $configLoader
     * @param CarChassisFactory $factory
     */
    public function __construct(CarConfigService $configLoader, CarChassisFactory $factory)
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
        $carEngine = $this->factory->from($carDetail['chassis']);

        /** @noinspection NonSecureUniqidUsageInspection */
        $unique = \md5(\uniqid());

        return $carEngine->getPrefix() . \substr($unique, 0, $carEngine->getLength());
    }
}
