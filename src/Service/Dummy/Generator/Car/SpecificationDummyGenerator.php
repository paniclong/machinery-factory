<?php

namespace App\Service\Dummy\Generator\Car;

use App\Service\Dummy\Generator\Car\Specifications\FuelConsumptionDummyGenerator;
use App\Service\Dummy\Generator\Car\Specifications\FuelDummyGenerator;
use App\Service\Dummy\Generator\Car\Specifications\GearDummyDummyGenerator;
use App\Service\Dummy\Generator\Car\Specifications\HorsePowerDummyGenerator;
use App\Service\Dummy\Generator\Car\Specifications\MaxSpeedDummyGenerator;
use App\Service\Dummy\Generator\Car\Specifications\TorqueDummyGenerator;
use App\ValueObject\Car\Specifications\Fuel;
use App\ValueObject\Car\Specifications\FuelConsumption;
use App\ValueObject\Car\Specifications\Gear;
use App\ValueObject\Car\Specifications\Horsepower;
use App\ValueObject\Car\Specifications\MaxSpeed;
use App\ValueObject\Car\Specifications\Torque;

class SpecificationDummyGenerator
{
    /**
     * @var TorqueDummyGenerator
     */
    private $carTorqueGenerator;

    /**
     * @var FuelDummyGenerator
     */
    private $carFuelGenerator;

    /**
     * @var MaxSpeedDummyGenerator
     */
    private $carMaxSpeedGenerator;

    /**
     * @var HorsePowerDummyGenerator
     */
    private $carHorsePowerGenerator;

    /**
     * @var FuelConsumptionDummyGenerator
     */
    private $carFuelConsumptionGenerator;

    /**
     * @var GearDummyDummyGenerator
     */
    private $carGearGenerator;

    /**
     * SpecificationDummyGenerator constructor.
     *
     * @param TorqueDummyGenerator $carTorqueGenerator
     * @param FuelDummyGenerator $carFuelGenerator
     * @param MaxSpeedDummyGenerator $carMaxSpeedGenerator
     * @param HorsePowerDummyGenerator $carHorsePowerGenerator
     * @param FuelConsumptionDummyGenerator $carFuelConsumptionGenerator
     * @param GearDummyDummyGenerator $carGearGenerator
     */
    public function __construct(
        TorqueDummyGenerator $carTorqueGenerator,
        FuelDummyGenerator $carFuelGenerator,
        MaxSpeedDummyGenerator $carMaxSpeedGenerator,
        HorsePowerDummyGenerator $carHorsePowerGenerator,
        FuelConsumptionDummyGenerator $carFuelConsumptionGenerator,
        GearDummyDummyGenerator $carGearGenerator
    ) {
        $this->carTorqueGenerator = $carTorqueGenerator;
        $this->carFuelGenerator = $carFuelGenerator;
        $this->carMaxSpeedGenerator = $carMaxSpeedGenerator;
        $this->carHorsePowerGenerator = $carHorsePowerGenerator;
        $this->carFuelConsumptionGenerator = $carFuelConsumptionGenerator;
        $this->carGearGenerator = $carGearGenerator;
    }

    /**
     * @return array
     *
     * @throws \Exception
     */
    public function generate(): array
    {
        return [
            Torque::class => $this->carTorqueGenerator->handle(),
            Fuel::class => $this->carFuelGenerator->handle(),
            MaxSpeed::class => $this->carMaxSpeedGenerator->handle(),
            Horsepower::class => $this->carHorsePowerGenerator->handle(),
            FuelConsumption::class => $this->carFuelConsumptionGenerator->handle(),
            Gear::class => $this->carGearGenerator->handle(),
        ];
    }
}
