<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use InvalidArgumentException;

enum Movements
{
    case F;
    case L;
    case R;
    case B;

    public static function from(string $movement): self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $movement) {
                return $case;
            }
        }

        throw new InvalidArgumentException("Invalid movement: $movement");
    }

    public static function valid(string $value): bool
    {
        return in_array($value, array_column(Movements::cases(), 'name'));
    }

    public function equals(Movements $movement): bool
    {
        if ($this === $movement) {
            return true;
        }
        return false;
    }

    public function handlerMethod(): string
    {
        return match ($this) {
            self::F => 'moveForward',
            self::L => 'turnLeft',
            self::R => 'turnRight',
            self::B => 'moveBackward',
        };
    }
}
