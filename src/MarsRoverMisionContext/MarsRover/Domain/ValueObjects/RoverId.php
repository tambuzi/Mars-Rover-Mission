<?php
namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NumberNotIntException;

class RoverId
{

    private int $id;

    public function __construct(int $roverId)
    {
        if (!is_int($roverId)) {
            throw new NumberNotIntException();
        }
        $this->id = $roverId;
    }

    public function value(): int
    {
        return $this->id;
    }
}
