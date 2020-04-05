<?php

namespace App\Service\Config;

class CarConfigService
{
    /**
     * @var YamlConfigLoader
     */
    private $configLoader;

    /**
     * @param YamlConfigLoader $configLoader
     */
    public function __construct(YamlConfigLoader $configLoader)
    {
        $this->configLoader = $configLoader;

        $this->configLoader->setCurrentDir(\dirname(__DIR__));
    }

    /**
     * @return array|string
     */
    public function getCarDetail()
    {
        return $this->load('car_detail.yaml');
    }

    /**
     * @return array|string
     */
    public function getSpecification()
    {
        return $this->load('specification.yaml');
    }

    /**
     * @param string $configName
     *
     * @return array|string
     */
    private function load(string $configName)
    {
        return $this->configLoader->load($this->getFullPath($configName));
    }

    /**
     * @param string $configName
     *
     * @return string
     */
    private function getFullPath(string $configName): string
    {
        return $this->configLoader->getLocator()->locate('../config/system/' . $configName);
    }
}
