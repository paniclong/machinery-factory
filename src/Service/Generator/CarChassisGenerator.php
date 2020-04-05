<?php

namespace App\Service\Generator;

use App\Factory\CarChassisFactory;
use App\Service\Config\CarConfigService;
use App\Service\Validator\CarValidatorField;

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
     * @var CarValidatorField
     */
    private $carValidatorField;

    /**
     * @param CarConfigService $configLoader
     * @param CarChassisFactory $factory
     * @param CarValidatorField $carValidatorField
     */
    public function __construct(
        CarConfigService $configLoader,
        CarChassisFactory $factory,
        CarValidatorField $carValidatorField
    ) {
        $this->configLoader = $configLoader;
        $this->factory = $factory;
        $this->carValidatorField = $carValidatorField;
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function generate(): string
    {
        $carDetail = $this->carValidatorField->validate(
            $this->configLoader->getCarDetail(),
            CarValidatorField::FIELD_TYPE_CHASSIS
        );

        $carChassis = $this->factory->from($carDetail);

        /** @noinspection NonSecureUniqidUsageInspection */
        $unique = \md5(\uniqid());

        return $carChassis->getPrefix() . \substr($unique, 0, $carChassis->getLength());
    }
}
