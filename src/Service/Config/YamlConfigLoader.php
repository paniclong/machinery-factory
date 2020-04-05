<?php

namespace App\Service\Config;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Yaml\Yaml;

class YamlConfigLoader extends FileLoader
{
    /**
     * @param $resource
     * @param null $type
     *
     * @return array|string
     */
    public function load($resource, $type = null)
    {
        return Yaml::parse(\file_get_contents($resource));
    }

    /**
     * @inheritDoc
     */
    public function supports($resource, $type = null): bool
    {
        return \is_string($resource) && 'yaml' === \pathinfo(
                $resource,
                PATHINFO_EXTENSION
            );
    }
}
