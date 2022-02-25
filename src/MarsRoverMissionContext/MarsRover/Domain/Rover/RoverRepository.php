<?php 
namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;

interface RoverRepository {
 
    /**
     * Create Mars Rover
     *
     * @param  int  $roverId
     * @param  Coordinates  $startingPoint
     * @param  string  $direction
     * @return void
     */
    public function createRover(int $roverId, Coordinates $startingPoint, string $direction);

    
}
