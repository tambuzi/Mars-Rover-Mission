<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

class MovementCollection
{

    /** @param Movement[] $movements */
    private function __construct(private array $movementCollection= [])
    {
    }

    public static function create(array $movements): MovementCollection
    {
        return new self($movements);
    }

    public static function emptyCollection(): MovementCollection
    {
        return new MovementCollection([]);
    }

    public function addMovement(Movement $movement): void
    {
        array_push($this->movementCollection, $movement);
    }

    public function getMovements(): array
    {
        return $this->movementCollection;
    }
}
