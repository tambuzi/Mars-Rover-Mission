<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance;

use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Meteorite;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;

class PersistanceRoverRepository implements RoverRepository, MeteoriteRepository
{

    public Rover $rover;
    private Meteorite $meteorite;
    private MeteoriteCollection $meteoriteCollection;



    public function createMeteorite(Coordinates $position)
    {
        $this->meteorite = new Meteorite($position);
        $this->meteoriteCollection->addMeteorite($this->meteorite);
        return $this->meteorite;
    }
    public function searchMeteorite(Coordinates $position)
    {
        foreach ($this->meteoriteCollection as $meteorite) {
            if ($position->pX->value() == $meteorite->position->pX->value() && $position->pY->value() == $meteorite->position->pY->value()) {
                return false;
            }
        }
        return true;
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
        $this->rover = new Rover($roverId, $startingPoint, $direction);

        return $this->rover;
    }
    public function moveRover(RoverId $roverId, $movement)
    {

        $realmovement = $this->calculateMovement($movement, $this->rover->getDirection());
        
        $coordinates = $this->calculateNewPosition($realmovement, $this->rover->getPosition());
        
        if ($this->searchMeteorite($coordinates)) {
            $this->rover->updateCoordinates($coordinates);
            return true;
        }
        return false;
    }

    private function calculateNewPosition($realmovement, $roverPosition)
    {
        if ($realmovement == "up") {
            return new Coordinates(new Position($roverPosition->pX->value()), new Position($roverPosition->pY->value() + 5));
        }
        if ($realmovement == "down") {
            return new Coordinates(new Position($roverPosition->pX->value() - 5), new Position($roverPosition->pY->value()));
        }
        if ($realmovement == "left") {
            return new Coordinates(new Position($roverPosition->pX->value() + 5), new Position($roverPosition->pY->value()));
        }
        if ($realmovement == "right") {
            return new Coordinates(new Position($roverPosition->pX->value() + 5), new Position($roverPosition->pY->value()));
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
