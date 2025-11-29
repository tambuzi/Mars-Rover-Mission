<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Exceptions\InvalidArgumentException;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;

final class CommandBuilder
{
    private ?Command $command = null;

    public function createCommand(string $commandNamespace, ...$commandArguments): void
    {
        $this->command = $this->instantiateViaNamedConstructor(
            $commandNamespace,
            $commandArguments
        );
    }

    private function instantiateViaNamedConstructor(string $class, array $args): Command
    {
        $reflection = new ReflectionClass($class);

        if (!$reflection->hasMethod('create')) {
            throw new InvalidArgumentException("Class $class must implement static method create().");
        }

        $method = $reflection->getMethod('create');

        if (!$method->isStatic()) {
            throw new InvalidArgumentException("Method create() in $class must be static.");
        }

        $parameters = $method->getParameters();
        $castedArgs = $this->castParams($parameters, $args);

        return $class::create(...$castedArgs);
    }

    private function castParams(array $parameters, array $args): array
    {
        $casted = [];
        $args = $args[0];

        foreach ($parameters as $index => $parameter) {

            if (!array_key_exists($index, $args)) {
                if ($parameter->isOptional()) {
                    $casted[] = $parameter->getDefaultValue();
                    continue;
                }

                throw new InvalidArgumentException(
                    sprintf(
                        "Missing required parameter '%s' for command. Position %d.",
                        $parameter->getName(),
                        $index
                    )
                );
            }

            $value = $args[$index];
            $type = $parameter->getType();

            if (!$type instanceof ReflectionNamedType) {
                $casted[] = $value;
                continue;
            }

            $expected = $type->getName();
            $allowsNull = $type->allowsNull();

            if ($value === null && $allowsNull) {
                $casted[] = null;
                continue;
            }

            if ($value === null && !$allowsNull) {
                throw new InvalidArgumentException(
                    sprintf(
                        "Parameter '%s' cannot be null. Expected %s.",
                        $parameter->getName(),
                        $expected
                    )
                );
            }

            if ($this->isAlreadyCorrectType($value, $expected)) {
                $casted[] = $value;
                continue;
            }

            $casted[] = $this->castValue($expected, $value, $allowsNull, $parameter);
        }

        return $casted;
    }

    private function isAlreadyCorrectType(mixed $value, string $expected): bool
    {
        return match ($expected) {
            'int' => is_int($value),
            'float' => is_float($value),
            'bool' => is_bool($value),
            'string' => is_string($value),
            'array' => is_array($value),
            default => $value instanceof $expected,
        };
    }

    private function castValue(string $expected, mixed $value, bool $allowsNull, ReflectionParameter $parameter): mixed
    {
        return match ($expected) {
            'int' => (int)$value,
            'float' => (float)$value,
            'bool' => filter_var($value, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE) ?? false,
            'string' => (string)$value,
            'array' => (array)$value,
            default => $this->castToObject($expected, $value, $parameter),
        };
    }

    private function castToObject(string $expectedClass, mixed $value, ReflectionParameter $parameter): mixed
    {
        if ($value instanceof $expectedClass) {
            return $value;
        }

        if (is_array($value)) {
            return new $expectedClass(...$value);
        }

        throw new InvalidArgumentException(
            sprintf(
                "Cannot convert parameter '%s' to %s. Value: %s",
                $parameter->getName(),
                $expectedClass,
                var_export($value, true)
            )
        );
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }
}
