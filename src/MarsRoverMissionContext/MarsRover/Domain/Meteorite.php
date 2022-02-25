<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;

class Meteorite
{
    private int $id;
    private Coordinates $startingPoint;


    private function __contructor(int $id, Coordinates $startingPoint)
    {
        $this->id = $id;
        $this->startingPoint = $startingPoint;
   
    }

    public function create(int $id, Coordinates $startingPoint)
    {
        return new Meteorite($id, $startingPoint);
    }
}
