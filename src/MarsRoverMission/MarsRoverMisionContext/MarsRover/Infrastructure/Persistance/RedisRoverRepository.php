<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance;

use Illuminate\Support\Facades\Redis;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Entity\Rover;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Model\RoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;

class RedisRoverRepository implements RoverRepository
{
    private Redis $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function save(Rover $rover): void
    {
        $this->redis::connection()->set('rover_' . $rover->getUuid()->toString(), serialize($rover));
    }

    public function getRover(RoverUuid $roverUuid): ?Rover
    {
        $data = $this->redis::connection()->get('rover_' . $roverUuid->toString());

        return $data
            ? unserialize($data)
            : null;
    }
}
