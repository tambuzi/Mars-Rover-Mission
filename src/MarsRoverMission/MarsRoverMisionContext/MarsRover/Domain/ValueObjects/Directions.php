<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

enum Directions: string
{
    case N = 'N';
    case E = 'E';
    case S = 'S';
    case O = 'O';

    public static function fromIndex(int $i): self
    {
        return self::cases()[$i];
    }

    public function index(): int
    {
        return array_search($this, self::cases(), true);
    }

    public function vector(): array
    {
        return match ($this) {
            self::N => ['x' => 0, 'y' => 1],
            self::E => ['x' => 1, 'y' => 0],
            self::O => ['x' => -1, 'y' => 0],
            self::S => ['x' => 0, 'y' => -1],
        };
    }

    public function value(): string
    {
        return $this->value;
    }
}

