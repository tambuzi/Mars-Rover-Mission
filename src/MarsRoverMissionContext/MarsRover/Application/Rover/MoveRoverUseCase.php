<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\MoveRoverUseCase;

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverMoveDTO\RoverMoveDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverMover\RoverMover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements\Movements;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId\RoverId;

class MoveRoverUseCase
{
    private RoverId $roverId;
    private Movements $movements;
    private $roverMoverRepository;

    public function __construct(RoverMover $roverMover)
    {
        
        $this->roverMoverRepository = $roverMover;
    }


    public function execute(RoverMoveDTO $roverMoveDTO)
    {

        $this->movements = new Movements($roverMoveDTO->movements);
        $this->roverId = new RoverId($roverMoveDTO->id);
        foreach ($this->movements as $movement) {
            $this->roverMoverRepository->moveRover($this->roverId, $movement);
        }
    }
}
