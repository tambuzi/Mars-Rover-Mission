<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NotStringException extends Exception
{
    public function __construct()
    {
        throw new Exception('Input not String.');
    }
}
