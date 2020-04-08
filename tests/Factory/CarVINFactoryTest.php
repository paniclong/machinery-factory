<?php

namespace App\Tests\Factory;

use App\Factory\CarVINFactory;
use App\ValueObject\VIN;
use PHPUnit\Framework\TestCase;

class CarVINFactoryTest extends TestCase
{
    private $factory;

    /**
     * @covers \App\Factory\CarVINFactory::from
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
                $vin = $this->createMock(VIN::class)
            );

        $this->assertEquals($vin, $this->factory->from($data));
    }

    protected function setUp()
    {
        $this->factory = $this->createMock(CarVINFactory::class);
    }
}
