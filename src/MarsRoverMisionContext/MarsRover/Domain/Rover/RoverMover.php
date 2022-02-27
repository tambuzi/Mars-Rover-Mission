<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId;

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
