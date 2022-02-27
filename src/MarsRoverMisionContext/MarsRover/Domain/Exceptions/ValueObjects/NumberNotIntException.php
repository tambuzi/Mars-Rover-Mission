<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NumberNotIntException extends Exception
{
    public function __construct()
    {
        abort(500, 'Number not Int.');
    }
}
