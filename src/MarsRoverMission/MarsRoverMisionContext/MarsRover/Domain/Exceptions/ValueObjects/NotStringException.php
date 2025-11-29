<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NotStringException extends Exception
{
    public function __construct()
    {
        parent::__construct('Input not a string');
    }
}
