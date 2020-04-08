<?php

namespace App\Service\Dummy\Generator\Car;

use App\Factory\Dummy\Car\EngineDummyFactory;
use App\Service\Config\CarConfigService;
use App\Service\Validator\CarValidatorField;

class EngineDummyGenerator
{
    /**
     * @var CarConfigService
     */
    private $configLoader;

    /**
     * @var EngineDummyFactory
     */
    private $factory;

    /**
     * @var CarValidatorField
     */
    private $carValidatorField;

    /**
     * @param CarConfigService $configLoader
     * @param EngineDummyFactory $factory
     * @param CarValidatorField $carValidatorField
     */
    public function __construct(
        CarConfigService $configLoader,
        EngineDummyFactory $factory,
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

        $unique = \md5(\uniqid($carEngine->getPrefix(), true));

        return $carEngine->getPrefix() . \substr($unique, 0, $carEngine->getLength());
    }
}
