<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Entity;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\MeteoriteCollisionExtension;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Directions;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movement;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\MovementCollection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;

class Rover
{

    private function __construct(
        private RoverUuid      $uuid,
        private Coordinates    $position,
        private RoverDirection $direction
    )
    {
    }

    public function updateCoordinates(Coordinates $position)
    {
        $this->position = $position;
    }

    public function getUuid(): RoverUuid
    {
        return $this->uuid;
    }

    public function getPosition(): Coordinates
    {
        return $this->position;
    }

    public function moveRover(MovementCollection $movements, MeteoriteCollection $meteorites): Rover
    {

        /** @var Movement $movement */
        foreach ($movements->getMovements() as $movement) {
            $action = $movement->value()->handlerMethod();
            $this->$action($meteorites);
        }

        return $this;
    }

    private function moveForward(MeteoriteCollection $meteorites): void
    {
        $this->move($meteorites);
    }

    private function move(MeteoriteCollection $meteorites): void
    {

        $movementFromDirection = $this->getDirection()->vector();
        $newPositionX = Position::create($this->position->getX()->value() + $movementFromDirection['x']);
        $newPositionY = Position::create($this->position->getY()->value() + $movementFromDirection['y']);
        $newCoordinates = Coordinates::create($newPositionX, $newPositionY);
        if ($meteorites->searchMeteorite($newCoordinates)) {
            throw new MeteoriteCollisionExtension($newCoordinates);
        }

        $this->position = $newCoordinates;
    }

    public function getDirection(): Directions
    {
        return $this->direction->value();
    }

    public static function create(RoverUuid $roverUuid, Coordinates $startingPoint, RoverDirection $direction): Rover
    {
        return new self($roverUuid, $startingPoint, $direction);
    }

    private function moveBackward(MeteoriteCollection $meteorites): void
    {
        $this->rotate(Movements::R);
        $this->rotate(Movements::R);

        $this->move($meteorites);
    }

    private function rotate(Movements $movement): void
    {
        $currentIndex = $this->direction->value()->index();
        if ($movement->equals(Movements::R)) {
            $newIndex = (($currentIndex + 1) % 4 + 4) % 4;

        }
        if ($movement->equals(Movements::L)) {
            $newIndex = (($currentIndex - 1) % 4 + 4) % 4;
        }

        $this->direction = RoverDirection::create(Directions::fromIndex($newIndex ?? $currentIndex)->value);
    }

    private function turnLeft(): void
    {
        $this->rotate(Movements::L);
    }

    private function turnRight(): void
    {
        $this->rotate(Movements::R);
    }
}
