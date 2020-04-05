<?php

namespace App\Utils\Specification;

use App\Factory\Specification\CarSpecificationDetailFactory;
use App\Service\Config\CarConfigService;
use App\Service\Validator\CarValidatorField;
use App\ValueObject\Specification;

abstract class AbstractSpecificationGenerator
{
    /**
     * @var CarConfigService
     */
    private $configLoader;

    /**
     * @var CarSpecificationDetailFactory
     */
    private $factory;

    /**
     * @var CarValidatorField
     */
    private $carValidatorField;

    /**
     * @var Specification
     */
    protected $specification;

    /**
     * @param CarConfigService $configLoader
     * @param CarSpecificationDetailFactory $factory
     * @param CarValidatorField $carValidatorField
     */
    public function __construct(
        CarConfigService $configLoader,
        CarSpecificationDetailFactory $factory,
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
