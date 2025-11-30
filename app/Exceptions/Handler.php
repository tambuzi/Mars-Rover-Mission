<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use InvalidUuidStringExceptio;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Exceptions\BaseException;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if ($e instanceof BaseException) {
            return response()->json([
                'error' => $e->getMessage(),
            ], $e->getErrorCode());
        }

        if ($e instanceof InvalidUuidStringException) {
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
        return parent::render($request, $e);
    }
}
