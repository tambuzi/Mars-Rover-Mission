<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http\CreateCanvasMeteoritesController;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http\CreateRoverController;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http\GetRoverController;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http\MoveRoverController;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http\GetAllMeteoritesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    // Canvas
    Route::post('/canvas/meteorites', [CreateCanvasMeteoritesController::class, '__invoke']);
    Route::get('/canvas/meteorites', [GetAllMeteoritesController::class, '__invoke']);

    // Rover
    Route::post('/rover', [CreateRoverController::class, '__invoke']);
    Route::get('/rover', [GetRoverController::class, '__invoke']);
    Route::post('/rover/move', [MoveRoverController::class, '__invoke']);

});
