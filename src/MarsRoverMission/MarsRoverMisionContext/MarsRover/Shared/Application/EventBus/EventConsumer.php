<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\EventBus;

interface EventConsumer
{
    public function consume(string $queue): void;
}
