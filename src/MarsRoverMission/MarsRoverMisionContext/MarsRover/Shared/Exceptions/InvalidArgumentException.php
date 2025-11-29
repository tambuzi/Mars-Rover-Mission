<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Exceptions;

use Illuminate\Http\Response;

class InvalidArgumentException extends BaseException
{
public function __construct(string $message)
{
    parent::__construct($message, Response::HTTP_BAD_REQUEST);
}
}
