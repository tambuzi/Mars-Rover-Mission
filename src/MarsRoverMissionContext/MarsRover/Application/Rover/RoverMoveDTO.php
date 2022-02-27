<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverMoveDTO;

class RoverMoveDTO
{

    private int $id;
    private array $move;


    private function __construct(int $id, array $move)
    {
        $this->id = $id;
        $this->move = $move;
    }

    public static function create(int $id, string $moveString)
    {
        $move = str_split($moveString);
        return new RoverMoveDTO($id, $move);
    }
}
