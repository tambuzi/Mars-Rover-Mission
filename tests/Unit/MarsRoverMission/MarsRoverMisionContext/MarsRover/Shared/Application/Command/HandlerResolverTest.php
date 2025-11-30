<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\HandlerResolver;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Command;
use PHPUnit\Framework\TestCase;

class HandlerResolverTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $resolver = new HandlerResolver([]);
        $this->assertInstanceOf(HandlerResolver::class, $resolver);
    }
    
    public function testResolveReturnsHandlerForCommand()
    {
        $command = $this->getMockForAbstractClass(Command::class);
        $handler = $this->getMockForAbstractClass(CommandHandler::class);
        $handlersMap = [get_class($command) => $handler];
        $resolver = new HandlerResolver($handlersMap);
        $result = $resolver->resolve($command);
        $this->assertSame($handler, $result);
    }
}
