<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NumberNotIntException;

use Exception;


class NumberNotIntException extends Exception
{
    public function __construct()
    {
        abort(500, 'Number not Int.');
    }
}
