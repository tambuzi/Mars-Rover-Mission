<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Exception;


class NotStringException extends Exception
{
    public function __construct()
    {
        abort(500, 'Input not String.');
    }
}
