<?php

namespace App\Tests\ValueObject;

use App\ValueObject\Detail\CarFuel;
use App\ValueObject\Detail\CarFuelConsumption;
use App\ValueObject\Detail\CarGear;
use App\ValueObject\Detail\CarHorsepower;
use App\ValueObject\Detail\CarMaxSpeed;
use App\ValueObject\Detail\CarTorque;
use App\ValueObject\Specification;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    /**
     * @var Specification
     */
    private $specification;

    /**
     * @var CarMaxSpeed
     */
    private $carMaxSpeed;

    /**
     * @var CarFuel
     */
    private $carFuel;

    /**
     * @var CarTorque
     */
    private $carTorque;

    /**
     * @var CarHorsepower
     */
    private $carHorsePower;

    /**
     * @var CarFuelConsumption
     */
    private $carFuelConsumption;

    /**
     * @var CarGear
     */
    private $carGer;

    /**
     * @covers \App\ValueObject\Specification::__construct
     * @covers \App\ValueObject\Specification::getCarMaxSpeed
     */
    public function testGetCarMaxSpeed(): void
    {
        $this->assertSame($this->specification->getCarMaxSpeed(),  $this->carMaxSpeed);
    }

    /**
     * @covers \App\ValueObject\Specification::getCarFuel
     */
    public function testGetCarFuel(): void
    {
        $this->assertSame($this->specification->getCarFuel(),  $this->carFuel);
    }

    /**
     * @covers \App\ValueObject\Specification::getCarTorque
     */
    public function testGetCarTorque(): void
    {
        $this->assertSame($this->specification->getCarTorque(),  $this->carTorque);
    }

    /**
     * @covers \App\ValueObject\Specification::getCarHorsepower
     */
    public function testGetCarHorsepower(): void
    {
        $this->assertSame($this->specification->getCarHorsepower(),  $this->carHorsePower);
    }

    /**
     * @covers \App\ValueObject\Specification::getCarFuelConsumption
     */
    public function testGetCarFuelConsumption(): void
    {
        $this->assertSame($this->specification->getCarFuelConsumption(),  $this->carFuelConsumption);
    }

    /**
     * @covers \App\ValueObject\Specification::getCarGear
     */
    public function testGetCarGear(): void
    {
        $this->assertSame($this->specification->getCarGear(),  $this->carGer);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->specification = new Specification(
            $this->carMaxSpeed = $this->createMock(CarMaxSpeed::class),
            $this->carFuel = $this->createMock(CarFuel::class),
            $this->carTorque = $this->createMock(CarTorque::class),
            $this->carHorsePower = $this->createMock(CarHorsepower::class),
            $this->carFuelConsumption = $this->createMock(CarFuelConsumption::class),
            $this->carGer = $this->createMock(CarGear::class)
        );
    }
}
