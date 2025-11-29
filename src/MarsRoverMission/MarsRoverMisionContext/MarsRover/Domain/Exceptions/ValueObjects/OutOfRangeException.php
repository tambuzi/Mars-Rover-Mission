<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class OutOfRangeException extends Exception
{
    public function __construct()
    {
        parent::__construct('Position Out Of Range.');
    }
}
