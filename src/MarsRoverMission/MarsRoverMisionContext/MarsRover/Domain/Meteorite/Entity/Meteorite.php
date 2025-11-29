<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;

class Meteorite
{

    private function __construct(private Coordinates $position)
    {
    }

    public static function create(Coordinates $position): Meteorite
    {
        return new self($position);
    }

    public function getPosition(): Coordinates
    {
        return $this->position;
    }
}
