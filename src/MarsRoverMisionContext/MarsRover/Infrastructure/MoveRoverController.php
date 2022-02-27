<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure;

use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\MoveRoverUseCase;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverMoveDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverMover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository;

class MoveRoverController
{

    private RoverMoveDTO $roverMoveDTO;
    private MoveRoverUseCase $movement;
    private PersistanceRoverRepository $persistanceRepository;

    public function __construct(PersistanceRoverRepository $persistanceRepository)
    {
     $this->persistanceRepository = $persistanceRepository;   
    }
    public function move(int $id, string $movements)
    {
        $this->roverMoveDTO = RoverMoveDTO::create($id, $movements);
      
        try {
            $this->movement = new MoveRoverUseCase(new RoverMover($this->persistanceRepository));
            
            return $this->movement->execute($this->roverMoveDTO);
        } catch (Exception $e) {
            return $e;
        }
    }
}
