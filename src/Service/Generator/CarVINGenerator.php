<?php

namespace App\Service\Generator;

use App\Factory\CarVINFactory;
use App\Service\Config\CarConfigService;
use App\Service\Validator\CarValidatorField;

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
     * @var CarValidatorField
     */
    private $carValidatorField;

    /**
     * @param CarConfigService $configLoader
     * @param CarVINFactory $factory
     * @param CarValidatorField $carValidatorField
     */
    public function __construct(
        CarConfigService $configLoader,
        CarVINFactory $factory,
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
            CarValidatorField::FIELD_TYPE_VIN
        );

        $carVIN = $this->factory->from($carDetail);

        /** @noinspection NonSecureUniqidUsageInspection */
        $unique = \md5(\uniqid());

        return $carVIN->getPrefix() . \substr($unique, 0, $carVIN->getLength());
    }
}
