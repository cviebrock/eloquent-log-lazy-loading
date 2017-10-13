<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

use Cviebrock\EloquentLogLazyLoading\Test\Models\Group;
use Cviebrock\EloquentLogLazyLoading\Test\Models\User;
use File;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;


/**
 * Class TestCase
 */
abstract class TestCase extends Orchestra
{

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    /**
     * @inheritdoc
     */
    protected function getEnvironmentSetUp($app)
    {
        $this->initializeDirectory(__DIR__ . '/temp');

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('groups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        $app['db']->connection()->getSchemaBuilder()->create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id');
            $table->string('name');
        });

        $group = Group::create(['name' => 'Group 1']);
        $groupId = $group->getKey();

        User::create(['group_id' => $groupId, 'name' => 'Colin']);
        User::create(['group_id' => $groupId, 'name' => 'Natalie']);
        User::create(['group_id' => $groupId, 'name' => 'Rebecca']);
    }

    protected function initializeDirectory($directory)
    {
        if (File::isDirectory($directory)) {
            File::deleteDirectory($directory);
        }
        File::makeDirectory($directory);
    }

    public function getTempDirectory($suffix = '')
    {
        return __DIR__ . '/temp' . ($suffix == '' ? '' : '/' . $suffix);
    }
}
