<?php

namespace Tests\Unit;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity\Meteorite;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Service\CreateMeteoriteService;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository;
use PHPUnit\Framework\TestCase;

class MeteoriteCreatorUnitTest extends TestCase
{
    /** @php */
    public function test_create_meteorite_should_return_meteorite()
    {
        $positionX = new Position(random_int(0, 200));
        $positionY = new Position(random_int(0, 200));
        $mockCoordinates = new Coordinates($positionX, $positionY);
        $persistanceMockReposotory = new PersistanceRoverRepository();
        $persistanceMockReposotory->createMeteoriteCollection();

        $mockRepository = new CreateMeteoriteService($persistanceMockReposotory);
        $expectedResponse = new Meteorite($mockCoordinates);

        $this->assertTrue($mockRepository->createMeteorite($mockCoordinates) == $expectedResponse);

    }



}
