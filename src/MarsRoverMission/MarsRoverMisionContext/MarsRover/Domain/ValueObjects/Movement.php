<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotStringException;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidMovementException;

final readonly class Movement
{

    private function __construct(private Movements $movement)
    {
    }

    public static function create(string $movement): Movement
    {
        if (!is_string($movement)) {
            throw new NotStringException();
        }
        if (!Movements::valid($movement)) {
            throw new NotValidMovementException();
        }
        return new self(Movements::from($movement));
    }

    public function value(): Movements
    {
        return $this->movement;
    }
}
