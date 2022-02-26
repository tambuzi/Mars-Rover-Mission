<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidDirectionException;

use Exception;


class NotValidDirectionException extends Exception
{
    public function __construct()
    {
        abort(500, 'Not Valid Direction.');
    }
}
