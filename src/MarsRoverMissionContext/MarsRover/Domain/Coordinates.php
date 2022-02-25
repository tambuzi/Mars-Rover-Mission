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

    public function create(int $positionX, int $positionY)
    {
        return new Coordinates($positionX, $positionY);
    }
}
