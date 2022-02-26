<?php 
namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;

interface MeteoriteRepository {
 
    public function createMeteorite( Coordinates $position);

    
}