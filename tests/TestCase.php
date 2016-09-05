<?php

namespace Hedii\LaravelDateRange\Tests;

use File;
use Illuminate\Foundation\Application;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * @var \Hedii\LaravelDateRange\Tests\TestModel
     */
    protected $testModel;

    public function setUp()
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    protected function getEnvironmentSetUp($app)
    {
        $this->initializeDirectory($this->getTempDirectory());

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => $this->getTempDirectory() . '/database.sqlite',
            'prefix' => ''
        ]);
    }

    protected function setUpDatabase(Application $app)
    {
        file_put_contents($this->getTempDirectory() . '/database.sqlite', null);

        $app['db']->connection()->getSchemaBuilder()->create('test_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('other_field')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    protected function initializeDirectory(string $directory)
    {
        if (File::isDirectory($directory)) {
            File::deleteDirectory($directory);
        }
        File::makeDirectory($directory);
    }

    public function getTempDirectory()
    {
        return __DIR__ . '/temp';
    }
}