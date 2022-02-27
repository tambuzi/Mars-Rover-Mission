<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NumberNotIntException;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\OutOfRangeException;

class Position
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
