<?php

namespace App\Service\Dummy\Generator\Car;

use App\Factory\Dummy\Car\VINDummyFactory;
use App\Service\Config\CarConfigService;
use App\Service\Validator\CarValidatorField;

class VINDummyGenerator
{
    /**
     * @var CarConfigService
     */
    private $configLoader;

    /**
     * @var VINDummyFactory
     */
    private $factory;

    /**
     * @var CarValidatorField
     */
    private $carValidatorField;

    /**
     * @param CarConfigService $configLoader
     * @param VINDummyFactory $factory
     * @param CarValidatorField $carValidatorField
     */
    public function __construct(
        CarConfigService $configLoader,
        VINDummyFactory $factory,
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

        $unique = \md5(\uniqid($carVIN->getPrefix(), true));

        return $carVIN->getPrefix() . \substr($unique, 0, $carVIN->getLength());
    }
}
