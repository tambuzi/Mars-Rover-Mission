<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverMover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover\Rover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository\RoverRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements\Movements;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection\RoverDirection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId\RoverId;

class RoverMover
{
    private RoverRepository $repository;

    public function __construct(RoverRepository $roverRepository)
    {
        $this->repository = $roverRepository;
    }

    public function moveRover(RoverId $roverId, Movements $move)
    {
        return $this->repository->moveRover($roverId, $move);
    }
}
