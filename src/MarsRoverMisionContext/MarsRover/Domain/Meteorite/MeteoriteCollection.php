<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Meteorite;

class MeteoriteCollection
{

    private array $meteoriteCollection ;

    private function __contructor(array $meteorites = null)
    {
        $this->meteoriteCollection = $meteorites;
    }

    public static function create(array $meteorites)
    {
        return new MeteoriteCollection($meteorites);
    }

    public function addMeteorite(Meteorite $meteorite)
    {
        array_push($this->meteoriteCollection, $meteorite);
    }

    public static function emptyCollection()
    {
        return new MeteoriteCollection();
    }
}
