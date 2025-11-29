<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Infrastructure\EventBus\RabbitMQ\Service;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQConnection
{
    public function __construct(
        private string $host,
        private int    $port,
        private string $user,
        private string $password
    )
    {
    }

    public function connection(): AMQPStreamConnection
    {
        return new AMQPStreamConnection(
            $this->host,
            $this->port,
            $this->user,
            $this->password
        );
    }
}
