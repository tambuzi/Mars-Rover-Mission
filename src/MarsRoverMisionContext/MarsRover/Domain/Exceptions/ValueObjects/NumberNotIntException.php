<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NumberNotIntException extends Exception
{
    public function __construct()
    {
        throw new Exception('Number not Int.');
    }
}
