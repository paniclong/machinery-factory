<?php

namespace App\Tests\ValueObject;

use PHPUnit\Framework\TestCase;

class EngineTest extends TestCase
{
    private $vin;

    private $data = [
        'prefix' => 'FOO',
        'length' => 10,
    ];

    public function testGetPrefix(): void
    {
        $this->assertEquals($this->vin->getPrefix(), $this->data['prefix']);
    }

    public function testGetLength(): void
    {
        $this->assertEquals($this->vin->getLength(), $this->data['length']);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->vin = new \App\ValueObject\CarEngineDummy($this->data['prefix'], $this->data['length']);
    }
}
