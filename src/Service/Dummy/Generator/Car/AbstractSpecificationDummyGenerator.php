<?php

namespace App\Service\Dummy\Generator\Car;

use App\Factory\Dummy\Car\SpecificationDummyFactory;
use App\Service\Config\CarConfigService;
use App\Service\Validator\CarValidatorField;
use App\ValueObject\Car\CarSpecificationDummy;

abstract class AbstractSpecificationDummyGenerator
{
    /**
     * @var CarConfigService
     */
    private $configLoader;

    /**
     * @var SpecificationDummyFactory
     */
    private $factory;

    /**
     * @var CarValidatorField
     */
    private $carValidatorField;

    /**
     * @var CarSpecificationDummy
     */
    protected $specification;

    /**
     * @param CarConfigService $configLoader
     * @param SpecificationDummyFactory $factory
     * @param CarValidatorField $carValidatorField
     */
    public function __construct(
        CarConfigService $configLoader,
        SpecificationDummyFactory $factory,
        CarValidatorField $carValidatorField
    ) {
        $this->configLoader = $configLoader;
        $this->factory = $factory;
        $this->carValidatorField = $carValidatorField;

        $this->setSpecification();
    }

    private function setSpecification(): void
    {
        $carSpecification = $this->carValidatorField->validate(
            $this->configLoader->getSpecification(),
            CarValidatorField::FIELD_TYPE_SPECIFICATION
        );

        $this->specification = $this->factory->from($carSpecification);
    }

    /**
     * @return mixed
     */
    abstract public function handle();
}
