<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position\Position;


class Coordinates
{
    private Position $pX;
    private Position $pY;


    private function __contructor(Position $positionX, Position $positionY)
    {
        $this->pX = $positionX;
        $this->pY = $positionY;
    }

    public static function create(Position $positionX, Position $positionY): self
    {
        return new self($positionX, $positionY);
    }
}
