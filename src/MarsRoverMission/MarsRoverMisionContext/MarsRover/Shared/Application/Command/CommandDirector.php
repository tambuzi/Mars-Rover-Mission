<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

final readonly class CommandDirector
{

    public function __construct(
        private CommandBuilder      $builder,
        private MessengerCommandBus $messengerCommand
    )
    {
    }

    public function create(string $commandNamespace, ...$commandArguments): Command
    {
        $this->builder->createCommand($commandNamespace, $commandArguments);
        return $this->builder->getCommand();
    }

    public function invokeSync(SyncCommand $command)
    {
        return $this->messengerCommand->dispatchSync($command);
    }

    public function invokeAsync(AsyncCommand $command)
    {
        $this->messengerCommand->dispatchAsync($command);
    }
}
