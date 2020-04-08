<?php

namespace App\Service\Dummy\Generator\Car;

use App\Factory\Dummy\Car\ChassisDummyFactory;
use App\Service\Config\CarConfigService;
use App\Service\Validator\CarValidatorField;

class ChassisDummyGenerator
{
    /**
     * @var CarConfigService
     */
    private $configLoader;

    /**
     * @var ChassisDummyFactory
     */
    private $factory;

    /**
     * @var CarValidatorField
     */
    private $carValidatorField;

    /**
     * @param CarConfigService $configLoader
     * @param ChassisDummyFactory $factory
     * @param CarValidatorField $carValidatorField
     */
    public function __construct(
        CarConfigService $configLoader,
        ChassisDummyFactory $factory,
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

        $unique = \md5(\uniqid($carChassis->getPrefix(), true));

        return $carChassis->getPrefix() . \substr($unique, 0, $carChassis->getLength());
    }
}
