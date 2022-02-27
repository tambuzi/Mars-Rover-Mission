<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;


class Coordinates
{
    public Position $pX;
    public Position $pY;


    public function __construct(Position $positionX, Position $positionY)
    {
        $this->pX = $positionX;
        $this->pY = $positionY;
    }

}
