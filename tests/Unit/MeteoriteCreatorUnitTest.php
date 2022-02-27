<?php

namespace Tests\Unit;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Meteorite;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

class MeteoriteCreatorUnitTest extends TestCase
{
    /** @test */
    public function test_create_meteorite_should_return_meteorite()
    {
        $positionX = new Position(random_int(0, 200));
        $positionY = new Position(random_int(0, 200));
        $mockCoordinates = new Coordinates($positionX, $positionY);
        $persistanceMockReposotory = new PersistanceRoverRepository();
        $persistanceMockReposotory->createMeteoriteCollection();

        $mockRepository = new MeteoriteCreator($persistanceMockReposotory);
        $expectedResponse = new Meteorite($mockCoordinates);

        $this->assertTrue($mockRepository->createMeteorite($mockCoordinates) == $expectedResponse);
    }


}
