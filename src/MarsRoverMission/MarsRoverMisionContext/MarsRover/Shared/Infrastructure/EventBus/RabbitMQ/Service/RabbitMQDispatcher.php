<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Infrastructure\EventBus\RabbitMQ\Service;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\AsyncCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\EventBus\EventDispatcher;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQDispatcher implements EventDispatcher
{
    private const string QUEUE = 'command_bus';

    public function __construct(
        private RabbitMQConnection $connection
    )
    {
    }

    public function dispatchCommand(AsyncCommand $command): void
    {
        $conn = $this->connection->connection();
        $channel = $conn->channel();


        $channel->queue_declare($this::QUEUE, false, true, false, false);

        $payload = json_encode([
            'type' => 'command',
            'command' => get_class($command),
            'data' => $command->toArray()
        ]);

        $message = new AMQPMessage($payload, [
            'content_type' => 'application/json',
            'delivery_mode' => 2
        ]);

        $channel->basic_publish($message, '', $this::QUEUE);

        $channel->close();
        $conn->close();
    }

    public function dispatch()
    {
        // TODO: Implement dispatch() method.
    }
}
