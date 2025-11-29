<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Exceptions;

use Exception;

class BaseException extends Exception
{
    private int $errorCode;

    public function __construct(string $message, int $errorCode)
    {
        parent::__construct($message);
        $this->errorCode = $errorCode;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}
