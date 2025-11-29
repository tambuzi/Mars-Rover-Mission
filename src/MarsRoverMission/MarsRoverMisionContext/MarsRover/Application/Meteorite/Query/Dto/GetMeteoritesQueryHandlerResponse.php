<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\Dto;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Dto\QueryHandlerResponse;

final readonly class GetMeteoritesQueryHandlerResponse implements QueryHandlerResponse
{
    private function __construct(
        private MeteoriteCollection $meteorites
    )
    {
    }

    public static function create(MeteoriteCollection $meteoriteCollection): GetMeteoritesQueryHandlerResponse
    {
        return new self($meteoriteCollection);
    }

    public function getMeteorites(): MeteoriteCollection
    {
        return $this->meteorites;
    }

    public function toArray(): array
    {
        $response = [];
        foreach ($this->meteorites->toArray() as $key => $meteorite) {
            $response[] = ["key" => $key,
                "position" => [
                    "x" => $meteorite->getPosition()->getX()->value(),
                    "y" => $meteorite->getPosition()->getY()->value()
                ],];
        }
        return $response;
    }
}


