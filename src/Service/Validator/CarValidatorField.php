<?php

namespace App\Service\Validator;

class CarValidatorField
{
    public const FIELD_TYPE_CHASSIS = 'chassis';
    public const FIELD_TYPE_ENGINE = 'engine';
    public const FIELD_TYPE_VIN = 'vin';
    public const FIELD_TYPE_SPECIFICATION = 'specification';

    private const VALIDATE_FIELDS = [
        'engine' => [
            'prefix' => 'string',
            'length' => 'int',
        ],
        'vin' => [
            'prefix' => 'string',
            'length' => 'int',
        ],
        'chassis' => [
            'prefix' => 'string',
            'length' => 'int',
        ],
        'specification' => [
            'max_speed' => [
                'min' => 'int',
                'max' => 'int',
            ],
            'fuel' => [
                0 => 'string',
                1 => 'string',
                2 => 'string',
            ],
            'torque' => [
                'min' => 'int',
                'max' => 'int',
            ],
            'horsepower' => [
                'min' => 'int',
                'max' => 'int',
            ],
            'fuel_consumption' => [
                'min' => 'int',
                'max' => 'int',
            ],
            'gear' => [
                0 => 'string',
                1 => 'string',
            ],
        ]
    ];

    /**
     * @param array $data
     * @param string $type
     *
     * @return array
     */
    public function validate(array $data, string $type): array
    {
        if (!isset($data[$type])) {
            throw new \InvalidArgumentException('Main field not isset');
        }

        $this->validateCustomFields($data[$type], self::VALIDATE_FIELDS[$type]);

        return $data[$type];
    }

    /**
     * @param array $fieldsForValidate
     * @param array $rightFields
     *
     * @return array|null
     */
    private function validateCustomFields(array $fieldsForValidate, array $rightFields): ?array
    {
        foreach ($rightFields as $field => $type) {
            if (!isset($fieldsForValidate[$field])) {
                throw new \InvalidArgumentException('Field not isset');
            }

            if (\is_array($fieldsForValidate[$field])) {
                $this->validateCustomFields($fieldsForValidate[$field], $rightFields[$field]);
            } else {
                switch ($type) {
                    case 'string':
                        if (!\is_string($fieldsForValidate[$field])) {
                            throw new \TypeError(
                                \sprintf('Field must be type string')
                            );
                        }
                        break;
                    case 'int':
                        if (!\is_int($fieldsForValidate[$field])) {
                            throw new \TypeError(
                                \sprintf('Field must be type int')
                            );
                        }
                        break;
                    default:
                        throw new \InvalidArgumentException('Type does not match');
                }
            }
        }

        return null;
    }
}
