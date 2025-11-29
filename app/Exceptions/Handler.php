<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Exceptions\BaseException;
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

        return parent::render($request, $e);
    }
}
