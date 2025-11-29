<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Infrastructure\EventBus;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\AsyncCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\HandlerResolver;
use PhpAmqpLib\Message\AMQPMessage;
use RuntimeException;

class MessageDispatcher
{
    function __construct(
        private HandlerResolver $handlerResolver
    )
    {
    }

    public function dispatch(AMQPMessage $message): void
    {
        $payload = json_decode($message->getBody(), true);

        if (!isset($payload['type'])) {
            throw new RuntimeException("Message does not contain a 'type' field");
        }

        switch ($payload['type']) {

            case 'command':
                $this->dispatchCommand($payload);
                break;

            case 'event':
                break;

            default:
                throw new RuntimeException("Unknown message type: {$payload['type']}");
        }
    }

    private function dispatchCommand(array $payload): void
    {
        $commandClass = $payload['command'];
        $data = $payload['data'] ?? [];

        /** @var AsyncCommand $command */
        $command = $commandClass::create(...array_values($data));

        $handler = $this->handlerResolver->resolve($command);
        $handler->handle($command);
    }

}
