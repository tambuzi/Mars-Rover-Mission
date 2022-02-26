<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\CreateRoverUseCase;

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverDTO\RoverDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverCreator\RoverCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection\RoverDirection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId\RoverId;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverPosition\RoverPosition;

class CreateRoverUseCase
{

    private $roverCreatorRepository;
    private $roverCoordinates;
    private $roverId;
    private $roverDirection;

    public function __construct(RoverCreator $roverCreator)
    {
        $this->RoverCreatorRepository = $roverCreator;
    }

    public function execute(RoverDTO $rover)
    {
        $this->roverId = new RoverId($rover->id);
        $this->direction = new RoverDirection($rover->direction);
        $this->startingPointX = new RoverPosition($rover->startingPointX);
        $this->startingPointY = new RoverPosition($rover->startingPointY);
        $this->roverCoordinates = Coordinates::create($this->startingPointX, $this->startingPointY);

        $this->roverCreatorRepository->createRover($this->roverId, $this->roverCoordinates, $this->roverDirection);
    }
}
