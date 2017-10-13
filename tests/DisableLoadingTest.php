<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

use Cviebrock\EloquentLogLazyLoading\LazyLoadingException;
use Cviebrock\EloquentLogLazyLoading\Test\Models\GroupLazyDisabled;
use Illuminate\Database\Eloquent\Collection;


class DisableLoadingTest extends TestCase
{

    /**
     * @test
     */
    public function it_disables_lazy_loading()
    {
        $group = GroupLazyDisabled::first();

        $this->expectException(LazyLoadingException::class);

        $users = $group->users;
    }

    /**
     * @test
     */
    public function it_allows_explicit_loading()
    {
        $group = GroupLazyDisabled::first();
        $group->load('users');

        $users = $group->users;

        $this->assertEquals(Collection::class, get_class($users));
        $this->assertCount(3, $users);
    }

}
