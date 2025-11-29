<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\SyncCommand;

final readonly class CreateRoverCommand implements SyncCommand
{

    private function __construct(
        private int    $startingPointX,
        private int    $startingPointY,
        private string $direction,
    )
    {
    }

    public static function create(int $startingPointX, int $startingPointY, string $direction): CreateRoverCommand
    {
        return new self($startingPointX, $startingPointY, $direction);
    }

    public function getStartingPointY(): int
    {
        return $this->startingPointY;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function getStartingPointX(): int
    {
        return $this->startingPointX;
    }
}
