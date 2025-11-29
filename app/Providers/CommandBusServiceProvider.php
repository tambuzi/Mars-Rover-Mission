<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command\CreateMeteoriteCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command\CreateMeteoriteCommandHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\GetMeteoritesCommandQuery;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\GetMeteoritesQueryHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\CreateRoverCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\CreateRoverCommandHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\MoveRoverCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\MoveRoverCommandHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\GetRoverCommandQuery;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\GetRoverQueryHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\HandlerResolver;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\EventBus\EventConsumer;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\EventBus\EventDispatcher;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Infrastructure\EventBus\RabbitMQ\Service\RabbitMQConnection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Infrastructure\EventBus\RabbitMQ\Service\RabbitMQConsumer;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Infrastructure\EventBus\RabbitMQ\Service\RabbitMQDispatcher;

class CommandBusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(HandlerResolver::class, fn() => new HandlerResolver([
            CreateRoverCommand::class => resolve(CreateRoverCommandHandler::class),
            MoveRoverCommand::class => resolve(MoveRoverCommandHandler::class),
            GetRoverCommandQuery::class => resolve(GetRoverQueryHandler::class),
            CreateMeteoriteCommand::class => resolve(CreateMeteoriteCommandHandler::class),
            GetMeteoritesCommandQuery::class => resolve(GetMeteoritesQueryHandler::class),
        ]));

        $this->app->bind(RabbitMQConnection::class, fn() => new RabbitMQConnection(
            env('RABBITMQ_HOST', 'localhost'),
            env('RABBITMQ_PORT', 5672),
            env('RABBITMQ_USER', 'guest'),
            env('RABBITMQ_PASS', 'guest')
        ));
        $this->app->bind(EventConsumer::class, RabbitMQConsumer::class);
        $this->app->bind(EventDispatcher::class, RabbitMQDispatcher::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
