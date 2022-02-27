<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverMoveDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverMover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId;

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

        $this->movements = new Movements($roverMoveDTO->move);

        $this->roverId = new RoverId($roverMoveDTO->id);
        foreach ($this->movements->value() as $movement) {
            if (!$this->roverMoverRepository->moveRover($this->roverId, $movement)) {
                return false;
            }
        }
        return true;
    }
}
