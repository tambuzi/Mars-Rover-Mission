<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotStringException\NotStringException;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidDirectionException\NotValidDirectionException;

class RoverDirection
{

    private int $direction;
    private array $validDireccions = ["N", "S", "E", "O"];

    public function __construct(int $roverDirection)
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
