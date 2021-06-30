<?php

namespace JoniDot\Reactions\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use JoniDot\Reactions\ReactionsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'JoniDot\\Reactions\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ReactionsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        include_once __DIR__.'/../database/migrations/create_reactions_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
