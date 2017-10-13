<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

use Cviebrock\EloquentLogLazyLoading\Test\Models\Group;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Database\Eloquent\Collection;


class LogLoadingTest extends TestCase
{

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->app->singleton(ExceptionHandler::class, TestExceptionHandler::class);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function it_logs_lazy_loading()
    {
        $group = Group::first();

        $this->expectsEvents(TestLoggingEvent::class);

        $users = $group->users;

        $this->assertEquals(Collection::class, get_class($users));
        $this->assertCount(3, $users);
    }

}
