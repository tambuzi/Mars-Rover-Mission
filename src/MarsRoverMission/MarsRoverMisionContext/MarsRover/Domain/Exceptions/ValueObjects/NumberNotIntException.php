<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NumberNotIntException extends Exception
{
    public function __construct()
    {
        parent::__construct('Number is not int.');
    }
}
