<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverPosition\RoverPosition;

class Coordinates
{
    private RoverPosition $pX;
    private RoverPosition $pY;


    private function __contructor(RoverPosition $positionX, RoverPosition $positionY)
    {
        $this->pX = $positionX;
        $this->pY = $positionY;
    }

    public static function create(RoverPosition $positionX, RoverPosition $positionY): self
    {
        return new self($positionX, $positionY);
    }
}
