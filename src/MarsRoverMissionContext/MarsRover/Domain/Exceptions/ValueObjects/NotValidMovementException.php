<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidMovementException;

use Exception;


class NotValidMovementException extends Exception
{
    public function __construct()
    {
        abort(500, 'Not Valid Movement.');
    }
}
