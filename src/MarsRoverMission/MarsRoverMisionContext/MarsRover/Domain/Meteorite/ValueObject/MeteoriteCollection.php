<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity\Meteorite;

class MeteoriteCollection
{

    /** @param Meteorite[] $meteoriteCollection */
    private function __construct(private array $meteoriteCollection = [])
    {
    }

    public static function create(array $meteorites): MeteoriteCollection
    {
        return new self($meteorites);
    }

    public static function emptyCollection(): MeteoriteCollection
    {
        return new MeteoriteCollection([]);
    }

    public function addMeteorite(Meteorite $meteorite): void
    {
        array_push($this->meteoriteCollection, $meteorite);
    }

    public function searchMeteorite(Coordinates $position)
    {
        foreach ($this->meteoriteCollection as $meteorite) {
            if ($meteorite->getPosition()->eqX($position->getX()) && $meteorite->getPosition()->eqY($position->getY())) {
                return true;
            }
        }
        return false;
    }

    public function toArray(): array
    {
        return $this->meteoriteCollection;
    }
}
