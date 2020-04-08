<?php

namespace App\Tests\Factory;

use App\Factory\CarEngineFactory;
use App\ValueObject\Engine;
use PHPUnit\Framework\TestCase;

class CarEngineFactoryTest extends TestCase
{
    private $factory;

    /**
     * @covers \App\Factory\CarEngineFactory::from
     */
    public function testFrom(): void
    {
        $data = [
            'prefix' => 'BAR',
            'length' => 10
        ];

        $this->factory
            ->expects($this->once())
            ->method('from')
            ->with($data)
            ->willReturn(
                $engine = $this->createMock(Engine::class)
            );

        $this->assertEquals($engine, $this->factory->from($data));
    }

    protected function setUp()
    {
        $this->factory = $this->createMock(CarEngineFactory::class);
    }
}
