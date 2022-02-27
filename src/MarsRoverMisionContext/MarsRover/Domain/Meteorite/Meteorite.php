<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;

class Meteorite
{
    private Coordinates $position;


    public function __construct(Coordinates $position)
    {

        $this->position = $position;
   
    }

}
