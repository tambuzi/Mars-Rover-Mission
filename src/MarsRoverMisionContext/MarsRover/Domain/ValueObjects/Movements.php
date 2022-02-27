<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotStringException;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidMovementException;

class Movements
{

    private array $movements;
    private array $validMovements = ["F", "L", "R"];
    public function __construct(array $movements)
    {
        foreach($movements as $movement){
            if (!is_string($movement)) {
                throw new NotStringException();
            }
            if (!in_array($movement, $this->validMovements)) {
                throw new NotValidMovementException();
            }
        }
        $this->movements = $movements;
    }

    public function value(): array
    {
        return $this->movements;
    }
}
