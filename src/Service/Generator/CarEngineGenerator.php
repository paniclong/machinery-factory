<?php

namespace App\Service\Generator;

use App\Factory\CarEngineFactory;
use App\Service\Config\CarConfigService;
use App\Service\Validator\CarValidatorField;

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
     * @var CarValidatorField
     */
    private $carValidatorField;

    /**
     * @param CarConfigService $configLoader
     * @param CarEngineFactory $factory
     * @param CarValidatorField $carValidatorField
     */
    public function __construct(
        CarConfigService $configLoader,
        CarEngineFactory $factory,
        CarValidatorField $carValidatorField
    ) {
        $this->configLoader = $configLoader;
        $this->factory = $factory;
        $this->carValidatorField = $carValidatorField;
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        $carDetail = $this->carValidatorField->validate(
            $this->configLoader->getCarDetail(),
            CarValidatorField::FIELD_TYPE_ENGINE
        );

        $carEngine = $this->factory->from($carDetail);

        /** @noinspection NonSecureUniqidUsageInspection */
        $unique = \md5(\uniqid());

        return $carEngine->getPrefix() . \substr($unique, 0, $carEngine->getLength());
    }
}
