<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NumberNotIntException;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\OutOfRangeException;

final readonly class Position
{

    private function __construct(private int $position)
    {
    }

    public static function create(int $position): self
    {
        if (!is_int($position)) {
            throw new NumberNotIntException();
        }
        if ($position < 0 || $position > 200) {
            throw new OutOfRangeException();
        }
        return new self($position);
    }

    public function equals(Position $position): bool
    {
        return $this->position === $position->value();
    }

    public function value(): int
    {
        return $this->position;
    }
}
