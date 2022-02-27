<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;

class Meteorite
{
    private Coordinates $position;


    private function __contructor(Coordinates $position)
    {

        $this->position = $position;
   
    }

    public static function create(Coordinates $position)
    {
        return new Meteorite($position);
    }
}
