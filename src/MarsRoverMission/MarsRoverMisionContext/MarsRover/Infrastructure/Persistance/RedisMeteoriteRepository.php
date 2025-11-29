<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance;

use Illuminate\Support\Facades\Redis;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model\MeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;

class RedisMeteoriteRepository implements MeteoriteRepository
{
    private Redis $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function getAllMeteorites(): MeteoriteCollection
    {
        $data = $this->redis::connection()->get('meteorites');

        return $data
            ? unserialize($data)
            : MeteoriteCollection::emptyCollection();
    }

    public function saveMeteorites(MeteoriteCollection $meteoriteCollection): void
    {
        $this->redis::connection()->set('meteorites', serialize($meteoriteCollection));
    }
}
