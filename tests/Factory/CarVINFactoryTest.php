<?php

namespace App\Tests\Factory;

use App\Factory\VINDummyFactory;
use App\ValueObject\CarVINDummy;
use PHPUnit\Framework\TestCase;

class CarVINFactoryTest extends TestCase
{
    private $factory;

    /**
     * @covers \App\Factory\VINDummyFactory::from
     */
    public function testFrom(): void
    {
        $data = [
            'prefix' => 'BAZ',
            'length' => 10
        ];

        $this->factory
            ->expects($this->once())
            ->method('from')
            ->with($data)
            ->willReturn(
                $vin = $this->createMock(CarVINDummy::class)
            );

        $this->assertEquals($vin, $this->factory->from($data));
    }

    protected function setUp()
    {
        $this->factory = $this->createMock(VINDummyFactory::class);
    }
}
