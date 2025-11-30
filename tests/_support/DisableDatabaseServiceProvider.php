<?php

namespace Tests\_support;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\DatabaseManager;

class DisableDatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Replace the database manager with a mock that doesn't connect
        $this->app->singleton('db', function ($app) {
            return new class extends DatabaseManager {
                public function connection($name = null)
                {
                    throw new \RuntimeException('Database connections are disabled in tests. This application uses Redis for storage.');
                }
                
                public function beginTransaction()
                {
                    // Do nothing - no transactions needed
                }
                
                public function commit()
                {
                    // Do nothing
                }
                
                public function rollBack()
                {
                    // Do nothing
                }
            };
        });
    }
}

