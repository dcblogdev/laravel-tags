<?php

namespace Dcblogdev\Tags\Tests;

use Dcblogdev\Tags\TagsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            TagsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver' => 'sqlite',
            'host' => '127.0.0.1',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();

        $this->loadMigrationsFrom(dirname(__DIR__).'/src/database/migrations');
    }
}
