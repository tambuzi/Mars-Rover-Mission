<?php
namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection;

class MeteoriteCollection {

    private array $meteoriteCollection;

    private function __contructor(array $meteorites)
    {
        $this->meteoriteCollection = $meteorites;
    }

    public static function create(array $meteorites)
    {
        return new MeteoriteCollection($meteorites);
    }
}