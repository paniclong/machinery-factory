<?php

namespace App\Tests\Factory;

use App\Factory\CarChassisFactory;
use App\ValueObject\Chassis;
use PHPUnit\Framework\TestCase;

class CarChassisFactoryTest extends TestCase
{
    private $factory;

    /**
     * @covers \App\Factory\CarChassisFactory::from
     */
    public function testFrom(): void
    {
        $data = [
            'prefix' => 'FOO',
            'length' => 10
        ];

        $this->factory
            ->expects($this->once())
            ->method('from')
            ->with($data)
            ->willReturn(
                $chassis = $this->createMock(Chassis::class)
            );

        $this->assertEquals($chassis, $this->factory->from($data));
    }

    protected function setUp()
    {
        $this->factory = $this->createMock(CarChassisFactory::class);
    }
}
