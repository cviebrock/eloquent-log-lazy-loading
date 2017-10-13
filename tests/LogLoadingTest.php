<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

use Cviebrock\EloquentLogLazyLoading\Test\Models\Group;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Database\Eloquent\Collection;


class LogLoadingTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        $this->app->singleton(ExceptionHandler::class, TestExceptionHandler::class);
    }

    public function testLogging()
    {
        $group = Group::first();

        $users = $group->users;

        $this->assertEquals(Collection::class, get_class($users));
        $this->assertCount(3, $users);
    }

}
