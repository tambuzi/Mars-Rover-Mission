<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements\Movements;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId\RoverId;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection\RoverDirection;

interface RoverRepository
{

    public function createRover(RoverId $roverId, Coordinates $startingPoint, RoverDirection $direction);

    public function moveRover(RoverId $roverId, Movements $movement);
}
