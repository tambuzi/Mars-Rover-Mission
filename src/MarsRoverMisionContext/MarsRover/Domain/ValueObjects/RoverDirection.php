<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotStringException;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidDirectionException;

class RoverDirection
{

    private string $direction;
    private array $validDireccions = ["N", "S", "E", "O"];

    public function __construct(string $roverDirection)
    {
        if (!is_string($roverDirection)) {
            throw new NotStringException();
        }
        if (!in_array($roverDirection, $this->validDireccions)) {
            throw new NotValidDirectionException();
        }
        $this->direction = $roverDirection;
    }

    public function value(): string
    {
        return $this->direction;
    }
}
