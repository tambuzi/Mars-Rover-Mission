<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Exceptions\InvalidArgumentException;

final class HandlerResolver
{
    private array $handlersMap;

    public function __construct(array $handlersMap)
    {
        $this->registerCommandHandlers($handlersMap);
    }

    private function registerCommandHandlers(array $commandHandlers): void
    {
        foreach ($commandHandlers as $command => $commandHandler) {
            $this->handlersMap[$command] = $commandHandler;
        }
    }

    public function resolve(Command $command): CommandHandler
    {
        $commandClass = get_class($command);
        $handler = $this->handlersMap[$commandClass] ?? null;
        if ($handler === null) {
            throw new InvalidArgumentException("Handler for command {$commandClass} not found");
        }
        return $handler;
    }

}
