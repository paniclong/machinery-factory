<?php

namespace App\Tests\ValueObject;

use App\ValueObject\Detail\Fuel;
use App\ValueObject\Detail\FuelConsumption;
use App\ValueObject\Detail\CarGear;
use App\ValueObject\Detail\Horsepower;
use App\ValueObject\Detail\MaxSpeed;
use App\ValueObject\Detail\Torque;
use App\ValueObject\CarSpecificationDummy;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    /**
     * @var CarSpecificationDummy
     */
    private $specification;

    /**
     * @var MaxSpeed
     */
    private $carMaxSpeed;

    /**
     * @var Fuel
     */
    private $carFuel;

    /**
     * @var Torque
     */
    private $carTorque;

    /**
     * @var Horsepower
     */
    private $carHorsePower;

    /**
     * @var FuelConsumption
     */
    private $carFuelConsumption;

    /**
     * @var CarGear
     */
    private $carGer;

    /**
     * @covers \App\ValueObject\CarSpecificationDummy::__construct
     * @covers \App\ValueObject\CarSpecificationDummy::getCarMaxSpeed
     */
    public function testGetCarMaxSpeed(): void
    {
        $this->assertSame($this->specification->getCarMaxSpeed(),  $this->carMaxSpeed);
    }

    /**
     * @covers \App\ValueObject\CarSpecificationDummy::getCarFuel
     */
    public function testGetCarFuel(): void
    {
        $this->assertSame($this->specification->getCarFuel(),  $this->carFuel);
    }

    /**
     * @covers \App\ValueObject\CarSpecificationDummy::getCarTorque
     */
    public function testGetCarTorque(): void
    {
        $this->assertSame($this->specification->getCarTorque(),  $this->carTorque);
    }

    /**
     * @covers \App\ValueObject\CarSpecificationDummy::getCarHorsepower
     */
    public function testGetCarHorsepower(): void
    {
        $this->assertSame($this->specification->getCarHorsepower(),  $this->carHorsePower);
    }

    /**
     * @covers \App\ValueObject\CarSpecificationDummy::getCarFuelConsumption
     */
    public function testGetCarFuelConsumption(): void
    {
        $this->assertSame($this->specification->getCarFuelConsumption(),  $this->carFuelConsumption);
    }

    /**
     * @covers \App\ValueObject\CarSpecificationDummy::getCarGear
     */
    public function testGetCarGear(): void
    {
        $this->assertSame($this->specification->getCarGear(),  $this->carGer);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->specification = new CarSpecificationDummy(
            $this->carMaxSpeed = $this->createMock(MaxSpeed::class),
            $this->carFuel = $this->createMock(Fuel::class),
            $this->carTorque = $this->createMock(Torque::class),
            $this->carHorsePower = $this->createMock(Horsepower::class),
            $this->carFuelConsumption = $this->createMock(FuelConsumption::class),
            $this->carGer = $this->createMock(CarGear::class)
        );
    }
}
