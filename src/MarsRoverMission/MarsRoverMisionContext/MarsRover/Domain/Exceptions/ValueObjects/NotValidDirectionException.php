<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NotValidDirectionException extends Exception
{
    public function __construct()
    {
        parent::__construct('Not a valid direction');
    }
}
