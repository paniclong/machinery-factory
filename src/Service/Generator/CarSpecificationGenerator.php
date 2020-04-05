<?php

namespace App\Service\Generator;

use App\Utils\Specification\CarFuelConsumptionGenerator;
use App\Utils\Specification\CarFuelGenerator;
use App\Utils\Specification\CarGearGenerator;
use App\Utils\Specification\CarHorsePowerGenerator;
use App\Utils\Specification\CarMaxSpeedGenerator;
use App\Utils\Specification\CarTorqueGenerator;
use App\ValueObject\Detail\CarFuel;
use App\ValueObject\Detail\CarFuelConsumption;
use App\ValueObject\Detail\CarGear;
use App\ValueObject\Detail\CarHorsepower;
use App\ValueObject\Detail\CarMaxSpeed;
use App\ValueObject\Detail\CarTorque;

class CarSpecificationGenerator
{
    /**
     * @var CarTorqueGenerator
     */
    private $carTorqueGenerator;

    /**
     * @var CarFuelGenerator
     */
    private $carFuelGenerator;

    /**
     * @var CarMaxSpeedGenerator
     */
    private $carMaxSpeedGenerator;

    /**
     * @var CarHorsePowerGenerator
     */
    private $carHorsePowerGenerator;

    /**
     * @var CarFuelConsumptionGenerator
     */
    private $carFuelConsumptionGenerator;

    /**
     * @var CarGearGenerator
     */
    private $carGearGenerator;

    /**
     * CarSpecificationGenerator constructor.
     *
     * @param CarTorqueGenerator $carTorqueGenerator
     * @param CarFuelGenerator $carFuelGenerator
     * @param CarMaxSpeedGenerator $carMaxSpeedGenerator
     * @param CarHorsePowerGenerator $carHorsePowerGenerator
     * @param CarFuelConsumptionGenerator $carFuelConsumptionGenerator
     * @param CarGearGenerator $carGearGenerator
     */
    public function __construct(
        CarTorqueGenerator $carTorqueGenerator,
        CarFuelGenerator $carFuelGenerator,
        CarMaxSpeedGenerator $carMaxSpeedGenerator,
        CarHorsePowerGenerator $carHorsePowerGenerator,
        CarFuelConsumptionGenerator $carFuelConsumptionGenerator,
        CarGearGenerator $carGearGenerator
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
            CarTorque::class => $this->carTorqueGenerator->handle(),
            CarFuel::class => $this->carFuelGenerator->handle(),
            CarMaxSpeed::class => $this->carMaxSpeedGenerator->handle(),
            CarHorsepower::class => $this->carHorsePowerGenerator->handle(),
            CarFuelConsumption::class => $this->carFuelConsumptionGenerator->handle(),
            CarGear::class => $this->carGearGenerator->handle(),
        ];
    }
}
