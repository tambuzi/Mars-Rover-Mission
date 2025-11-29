<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;


final readonly class Coordinates
{

    private function __construct(
        private Position $pX,
        private Position $pY
    )
    {
    }

    public static function create(Position $positionX, Position $positionY): self
    {
        return new self($positionX, $positionY);
    }

    public function getX(): Position
    {
        return $this->pX;
    }

    public function eqX(Position $position): bool
    {
        return $this->pX->equals($position);
    }

    public function eqY(Position $position): bool
    {
        return $this->pY->equals($position);
    }

    public function getY(): Position
    {
        return $this->pY;
    }


}
