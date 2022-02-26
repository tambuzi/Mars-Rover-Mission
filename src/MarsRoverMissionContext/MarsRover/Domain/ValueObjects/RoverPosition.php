<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverPosition;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NumberNotIntException\NumberNotIntException;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\OutOfRangeException\OutOfRangeException;

class RoverPosition
{

    private int $position;

    public function __construct(int $position)
    {
        if (!is_int($position)) {
            throw new NumberNotIntException();
        }
        if ($position < 0 || $position > 200) {
            throw new OutOfRangeException();
        }
        $this->position = $position;
    }

    public function value(): int
    {
        return $this->position;
    }
}
