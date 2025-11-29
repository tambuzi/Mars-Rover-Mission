<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Cli;

use Illuminate\Console\Command;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\EventBus\EventConsumer;

final class ConsumeRabbitMQCommand extends Command
{
    protected $signature = 'rabbitmq:consume {queue : Queue name to consume}';
    protected $description = 'Consume messages from RabbitMQ queue';

    private EventConsumer $consumer;


    public function handle()
    {
        $queue = $this->argument('queue');

        $this->consumer = resolve(EventConsumer::class);

        $this->info("Listening on queue '{$queue}'...");
        $this->consumer->consume($queue);
    }
}

