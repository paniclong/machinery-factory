<?php

namespace App\Service\Generator;

use App\Factory\CarEngineFactory;
use App\Service\Config\CarConfigService;

class CarEngineGenerator
{
    /**
     * @var CarConfigService
     */
    private $configLoader;

    /**
     * @var CarEngineFactory
     */
    private $factory;

    /**
     * @param CarConfigService $configLoader
     * @param CarEngineFactory $factory
     */
    public function __construct(CarConfigService $configLoader, CarEngineFactory $factory)
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
        $carEngine = $this->factory->from($carDetail['engine']);

        /** @noinspection NonSecureUniqidUsageInspection */
        $unique = \md5(\uniqid());

        return $carEngine->getPrefix() . \substr($unique, 0, $carEngine->getLength());
    }
}
