<?php

namespace Tests\Feature\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCanvasMeteoritesControllerTest extends TestCase
{
    public function testCreateCanvasMeteoritesSuccessfully()
    {
        $response = $this->postJson('/api/v1/canvas/meteorites');

        $response->assertStatus(201);
    }

    public function testCreateCanvasMeteoritesMultipleTimes()
    {
        // Create meteorites first time
        $response1 = $this->postJson('/api/v1/canvas/meteorites');
        $response1->assertStatus(201);

        // Create meteorites second time (should replace or add more)
        $response2 = $this->postJson('/api/v1/canvas/meteorites');
        $response2->assertStatus(201);
    }
}

