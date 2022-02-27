<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class OutOfRangeException extends Exception
{
    public function __construct()
    {
        throw new Exception( 'Position Out Of Range.');
    }
}
