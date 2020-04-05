<?php

namespace App\Utils\Specification;

use App\Factory\Specification\CarSpecificationDetailFactory;
use App\Service\Config\CarConfigService;
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
     * @param CarConfigService $configLoader
     * @param CarSpecificationDetailFactory $factory
     */
    public function __construct(CarConfigService $configLoader, CarSpecificationDetailFactory $factory)
    {
        $this->configLoader = $configLoader;
        $this->factory = $factory;
    }

    /**
     * @return Specification
     */
    protected function getSpecification(): Specification
    {
        $specificationsArray = $this->configLoader->getSpecification();

        return $this->factory->from($specificationsArray);
    }

    /**
     * @return mixed
     */
    abstract public function handle();
}
