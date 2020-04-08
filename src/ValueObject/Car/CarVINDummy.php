<?php

namespace App\ValueObject\Car;

class CarVINDummy
{
    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $length;

    /**
     * CarEngineDummy constructor.
     * @param string $prefix
     * @param string $length
     */
    public function __construct(string $prefix, string $length)
    {
        $this->prefix = $prefix;
        $this->length = $length;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @return string
     */
    public function getLength(): string
    {
        return $this->length;
    }
}
