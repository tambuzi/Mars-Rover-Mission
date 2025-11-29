<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model\MeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Model\RoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\RedisMeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\RedisRoverRepository;

class MarsRoverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            MeteoriteRepository::class,
            RedisMeteoriteRepository::class
        );

        $this->app->bind(
            RoverRepository::class,
            RedisRoverRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
