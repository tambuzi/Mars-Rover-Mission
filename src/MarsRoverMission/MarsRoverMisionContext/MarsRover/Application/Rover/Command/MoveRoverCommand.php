<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\AsyncCommand;

final readonly class MoveRoverCommand implements AsyncCommand
{

    private function __construct(
        private string $roverUuid,
        private array  $move
    )
    {
    }

    public static function create(string $uuid, string $moveString): MoveRoverCommand
    {
        $move = str_split($moveString);
        return new MoveRoverCommand($uuid, $move);
    }

    public function getRoverUuid(): string
    {
        return $this->roverUuid;
    }

    public function getMove(): array
    {
        return $this->move;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->roverUuid,
            'move' => implode('', $this->move)
        ];
    }
}
