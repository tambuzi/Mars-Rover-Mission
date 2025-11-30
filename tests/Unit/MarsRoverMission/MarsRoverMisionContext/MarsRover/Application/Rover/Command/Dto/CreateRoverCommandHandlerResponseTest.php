<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\Dto;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\Dto\CreateRoverCommandHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use PHPUnit\Framework\TestCase;

class CreateRoverCommandHandlerResponseTest extends TestCase
{
    public function testStaticCreateAndGetter()
    {
        $uuid = RoverUuid::generate();
        $dto = CreateRoverCommandHandlerResponse::create($uuid);
        $this->assertInstanceOf(CreateRoverCommandHandlerResponse::class, $dto);
        $this->assertSame($uuid, $dto->getRoverUuid());
    }
}
