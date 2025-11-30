<?php
namespace Tests\_support\Helper;

use Codeception\Module;

class Acceptance extends Module
{
    public function _beforeSuite($settings = [])
    {
        // Set environment to prevent database connection attempts
        putenv('DB_CONNECTION=');
        $_ENV['DB_CONNECTION'] = '';
    }
    
    public function _before(\Codeception\TestInterface $test)
    {
        // Replace database manager with a no-op implementation after Laravel boots
        try {
            if (function_exists('app')) {
                $app = app();
                if ($app->bound('db')) {
                    $mockDb = \Mockery::mock('Illuminate\Database\DatabaseManager');
                    $mockDb->shouldReceive('connection')->andReturnSelf();
                    $mockDb->shouldReceive('beginTransaction')->andReturnNull();
                    $mockDb->shouldReceive('commit')->andReturnNull();
                    $mockDb->shouldReceive('rollBack')->andReturnNull();
                    $mockDb->shouldReceive('transaction')->andReturnUsing(function ($callback) {
                        return $callback();
                    });
                    $mockDb->shouldReceive('getConnections')->andReturn([]);
                    $app->instance('db', $mockDb);
                }
            }
        } catch (\Exception $e) {
            // Ignore if app is not available yet or database is not bound
        }
    }
}

