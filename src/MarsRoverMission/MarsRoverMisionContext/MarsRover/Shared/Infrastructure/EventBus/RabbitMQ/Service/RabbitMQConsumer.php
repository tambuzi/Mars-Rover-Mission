<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Infrastructure\EventBus\RabbitMQ\Service;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\EventBus\EventConsumer;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Infrastructure\EventBus\MessageDispatcher;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQConsumer implements EventConsumer
{
    public function __construct(
        private RabbitMQConnection $connection,
        private MessageDispatcher  $dispatcher
    )
    {
    }

    public function consume(string $queue): void
    {
        $conn = $this->connection->connection();
        $channel = $conn->channel();

        $channel->queue_declare($queue, false, true, false, false);

        $channel->basic_consume(
            $queue,
            '',
            false,
            true,
            false,
            false,
            function (AMQPMessage $message) {
                $this->dispatcher->dispatch($message);
             //   $message->ack();
            }
        );

        while ($channel->is_consuming()) {
            $channel->wait();
        }
    }
}
