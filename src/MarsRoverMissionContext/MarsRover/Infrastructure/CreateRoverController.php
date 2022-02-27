<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\CreateRoverController;

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\CreateRoverUseCase\CreateRoverUseCase;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverDTO\RoverDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverCreator\RoverCreator;

use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository\PersistanceRoverRepository;

class CreateRoverController
{
    private RoverDTO $roverDTO;
    private CreateRoverUseCase $rover;

    public function create(int $startPositionX, int $startPositionY, string $direction)
    {
        try {
            $this->roverDTO = new RoverDTO(rand(), $startPositionX, $startPositionY, $direction);

            $this->rover = new CreateRoverUseCase(new RoverCreator(new PersistanceRoverRepository()));
            return $this->rover->execute($this->roverDTO);
        } catch (Exception $error) {
            return $error;
        }
    }
}
