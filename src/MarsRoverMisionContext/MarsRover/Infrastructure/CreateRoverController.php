<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure;

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\CreateRoverUseCase;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverCreator;

use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository;

class CreateRoverController
{
    private RoverDTO $roverDTO;
    private CreateRoverUseCase $rover;
    private PersistanceRoverRepository $persistanceRepository;

    public function __construct(PersistanceRoverRepository $persistanceRepository)
    {
        $this->persistanceRepository = $persistanceRepository;
    }
    public function create(int $startPositionX, int $startPositionY, string $direction)
    {
        try {
            $this->roverDTO = new RoverDTO(rand(), $startPositionX, $startPositionY, $direction);

            $this->rover = new CreateRoverUseCase(new RoverCreator($this->persistanceRepository));
     
            
            return $this->rover->execute($this->roverDTO);
        } catch (Exception $error) {
            return $error;
        }
    }
}
