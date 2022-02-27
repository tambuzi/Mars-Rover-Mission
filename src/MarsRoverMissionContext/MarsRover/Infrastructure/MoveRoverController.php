<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\MoveRoverController;

use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\MoveRoverUseCase\MoveRoverUseCase;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverMoveDTO\RoverMoveDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverMover\RoverMover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository\PersistanceRoverRepository;

class MoveRoverController
{

    private RoverMoveDTO $roverMoveDTO;
    private MoveRoverUseCase $movement;
    public function move(int $id, string $movements)
    {
        $this->roverMoveDTO = RoverMoveDTO::create($id, $movements);
        try {
            $this->movement = new MoveRoverUseCase(new RoverMover(new PersistanceRoverRepository()));
            $this->movement->execute($this->roverMoveDTO);
        } catch (Exception $e) {
            return $e;
        }
    }
}
