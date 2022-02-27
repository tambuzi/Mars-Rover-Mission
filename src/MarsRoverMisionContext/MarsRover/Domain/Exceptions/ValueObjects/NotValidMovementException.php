<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NotValidMovementException extends Exception
{
    public function __construct()
    {
        throw new Exception('Not Valid Movement.');
    }
}
