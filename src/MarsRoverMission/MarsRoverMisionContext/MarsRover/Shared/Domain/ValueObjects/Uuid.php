<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Domain\ValueObjects;

use Ramsey\Uuid\UuidInterface;

class Uuid
{
    protected UuidInterface $uuid;

    public function __construct(?UuidInterface $uuid = null)
    {
        $this->uuid = $uuid ?? \Ramsey\Uuid\Uuid::uuid4();
    }

    public static function generate(): Uuid
    {
        return new static();
    }

    public static function fromString(string $uuidString): Uuid
    {
        return new static(\Ramsey\Uuid\Uuid::fromString($uuidString));
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }
}
