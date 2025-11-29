<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\EventBus\EventDispatcher;

final readonly class MessengerCommandBus implements CommandBus
{

    public function __construct(
        private HandlerResolver $handlerResolver,
        private EventDispatcher $eventDispatcher
    )
    {
    }

    public function dispatchSync(SyncCommand $command)
    {
        $handler = $this->handlerResolver->resolve($command);
        return $handler->handle($command);
    }

    public function dispatchAsync(AsyncCommand $command): void
    {
        $this->eventDispatcher->dispatchCommand($command);
    }
}
