<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NotValidMovementException extends Exception
{
    public function __construct()
    {
        parent::__construct('Not Valid Movement.');
    }
}
