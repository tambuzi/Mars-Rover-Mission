<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotStringException;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidDirectionException;

final readonly class RoverDirection
{

    private function __construct(private Directions $direction)
    {
    }

    public static function create(string $direction): RoverDirection
    {
        if (!is_string($direction)) {
            throw new NotStringException();
        }
        if (!Directions::tryFrom($direction)) {
            throw new NotValidDirectionException();
        }
        return new self(Directions::from($direction));
    }

    public function value(): Directions
    {
        return $this->direction;
    }
}
