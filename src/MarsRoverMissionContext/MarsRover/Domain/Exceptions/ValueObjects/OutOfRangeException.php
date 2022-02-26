<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\OutOfRangeException;

use Exception;


class OutOfRangeException extends Exception
{
    public function __construct()
    {
        abort(500, 'Position Out Of Range.');
    }
}
