<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;

interface RoverRepository
{

    public function createRover(RoverId $roverId, Coordinates $startingPoint, RoverDirection $direction);

    public function moveRover(RoverId $roverId, Movements $movement);
}
