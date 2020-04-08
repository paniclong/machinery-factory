<?php

namespace App\Tests\Factory;

use App\Factory\EngineDummyFactory;
use App\ValueObject\CarEngineDummy;
use PHPUnit\Framework\TestCase;

class CarEngineFactoryTest extends TestCase
{
    private $factory;

    /**
     * @covers \App\Factory\EngineDummyFactory::from
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
                $engine = $this->createMock(CarEngineDummy::class)
            );

        $this->assertEquals($engine, $this->factory->from($data));
    }

    protected function setUp()
    {
        $this->factory = $this->createMock(EngineDummyFactory::class);
    }
}
