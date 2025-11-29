<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\Dto;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Entity\Rover;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Directions;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Dto\QueryHandlerResponse;

final readonly class GetRoverQueryHandlerResponse implements QueryHandlerResponse
{
    private function __construct(
        private RoverUuid   $roverUuid,
        private Coordinates $position,
        private Directions  $directions,
    )
    {
    }

    public static function fromRover(Rover $rover): GetRoverQueryHandlerResponse
    {
        return new self($rover->getUuid(), $rover->getPosition(), $rover->getDirection());
    }

    public function getRoverUuid(): RoverUuid
    {
        return $this->roverUuid;
    }

    public function getPosition(): Coordinates
    {
        return $this->position;
    }

    public function getDirections(): Directions
    {
        return $this->directions;
    }

    public static function create(
        RoverUuid   $roverUuid,
        Coordinates $position,
        Directions  $directions
    ): GetRoverQueryHandlerResponse
    {
        return new self($roverUuid, $position, $directions);
    }

    public function toArray(): array
    {
        return [
            "uuid" => $this?->roverUuid->toString(),
            "position" => [
                "x" => $this->position->getX()->value(),
                "y" => $this->position->getY()->value()
            ],
            "direction" => $this->directions->value()
        ];
    }
}
