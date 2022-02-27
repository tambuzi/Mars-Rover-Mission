<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Meteorite;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection\MeteoriteCollection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository\MeteoriteRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover\Rover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository\RoverRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements\Movements;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position\Position;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId\RoverId;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection\RoverDirection;

class PersistanceRoverRepository implements RoverRepository, MeteoriteRepository
{

    private static Rover $rover;
    private static Meteorite $meteorite;
    private static MeteoriteCollection $meteoriteCollection;



    public function createMeteorite(Coordinates $position)
    {
        $this->meteorite = Meteorite::create($position);
        $this->meteoriteCollection->addMeteorite($this->meteorite);
        return $this->meteorite;
    }
    public function searchMeteorite(Coordinates $position)
    {
    }

    public function getAllMeteorites()
    {
        return $this->meteoriteCollection;
    }

    public function createMeteoriteCollection()
    {
        $this->meteoriteCollection = MeteoriteCollection::emptyCollection();
    }
    public function createRover(RoverId $roverId, Coordinates $startingPoint, RoverDirection $direction)
    {
        $this->rover = Rover::create($roverId, $startingPoint, $direction);
        return $this->rover;
    }
    public function moveRover(RoverId $roverId, Movements $movement)
    {

        $realmovement = $this->calculateMovement($movement, $this->rover->direction->value);
        $coordinates = $this->calculateNewPosition($realmovement, $this->rover->position);

        $this->rover->updateCoordinates($coordinates);
    }

    private function calculateNewPosition($realmovement, $roverPosition)
    {
        if ($realmovement == "up") {
            return Coordinates::create(new Position($roverPosition->pX->value()), new Position($roverPosition->pY->value() + 1));
        }
        if ($realmovement == "down") {
            return Coordinates::create(new Position($roverPosition->pX->value() - 1), new Position($roverPosition->pY->value()));
        }
        if ($realmovement == "left") {
            return Coordinates::create(new Position($roverPosition->pX->value() + 1), new Position($roverPosition->pY->value()));
        }
        if ($realmovement == "right") {
            return Coordinates::create(new Position($roverPosition->pX->value() + 1), new Position($roverPosition->pY->value()));
        }
    }
    private function calculateMovement($movement, $direction)
    {
        if ($direction == "N") {
            if ($movement == "F") {
                return "up";
            }
            if ($movement == "L") {
                return "left";
            }
            if ($movement == "R") {
                return "rigth";
            }
        }
        if ($direction == "S") {
            if ($movement == "F") {
                return "down";
            }
            if ($movement == "L") {
                return "right";
            }
            if ($movement == "R") {
                return "left";
            }
        }
        if ($direction == "E") {
            if ($movement == "F") {
                return "right";
            }
            if ($movement == "L") {
                return "up";
            }
            if ($movement == "R") {
                return "down";
            }
        }
        if ($direction == "W") {
            if ($movement == "F") {
                return "left";
            }
            if ($movement == "L") {
                return "down";
            }
            if ($movement == "R") {
                return "up";
            }
        }
    }
}
