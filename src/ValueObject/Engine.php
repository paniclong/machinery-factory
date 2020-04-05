<?php

namespace App\ValueObject;

class Engine
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
     * Engine constructor.
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
