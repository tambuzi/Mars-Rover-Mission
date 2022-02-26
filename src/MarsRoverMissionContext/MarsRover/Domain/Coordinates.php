<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates;



class Coordinates
{
    private int $pX;
    private int $pY;


    private function __contructor(int $positionX, int $positionY)
    {
        $this->pX = $positionX;
        $this->pY = $positionY;
    }

    public static function create(int $positionX, int $positionY): self
    {
        return new self($positionX, $positionY);
    }
}
