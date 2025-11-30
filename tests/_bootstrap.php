<?php
// Set environment variables before Laravel boots
putenv('APP_ENV=testing');
$_ENV['APP_ENV'] = 'testing';
$_SERVER['APP_ENV'] = 'testing';

// Register a service provider to disable database connections
// This will be registered in the helper

