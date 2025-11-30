<?php

namespace Tests\Feature\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateRoverControllerTest extends TestCase
{
    public function testCreateRoverSuccessfully()
    {
        $response = $this->postJson('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'uuid'
            ])
            ->assertJson([
                'uuid' => function ($uuid) {
                    $this->assertIsString($uuid);
                    $this->assertNotEmpty($uuid);
                }
            ]);
    }

    public function testCreateRoverWithInvalidDirection()
    {
        $response = $this->postJson('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'INVALID'
        ]);

        $response->assertStatus(500);
    }

    public function testCreateRoverWithOutOfRangeCoordinates()
    {
        $response = $this->postJson('/api/v1/rover', [
            'startingPointX' => 250,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $response->assertStatus(500);
    }

    public function testCreateRoverWithMissingParameters()
    {
        $response = $this->postJson('/api/v1/rover', [
            'startingPointX' => 5,
        ]);

        $response->assertStatus(500);
    }
}

