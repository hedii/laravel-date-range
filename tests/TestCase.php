<?php

namespace Hedii\LaravelDateRange\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * @var \Hedii\LaravelDateRange\Tests\TestModel
     */
    protected $testModel;

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    protected function getEnvironmentSetUp($app): void
    {
        $this->initializeDirectory($this->getTempDirectory());

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => $this->getTempDirectory() . '/database.sqlite',
            'prefix' => ''
        ]);
    }

    protected function setUpDatabase(Application $app): void
    {
        file_put_contents($this->getTempDirectory() . '/' . $this->getTempSqliteFile(), null);

        $app['db']->connection()->getSchemaBuilder()->create('test_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('other_field')->nullable();
            $table->string('url')->nullable();
            $table->timestamp('logged_in_at')->nullable();
            $table->timestamps();
        });
    }

    protected function initializeDirectory(string $directory): void
    {
        if (! File::exists($directory . '/' . $this->getTempSqliteFile())) {
            if (File::isDirectory($directory)) {
                File::deleteDirectory($directory);
            }
            File::makeDirectory($directory);
        }

    }

    public function getTempDirectory(): string
    {
        return __DIR__ . '/temp';
    }

    public function getTempSqliteFile(): string
    {
        return 'database.sqlite';
    }
}
