<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

use Cviebrock\EloquentLogLazyLoading\LazyLoadingException;
use Cviebrock\EloquentLogLazyLoading\Test\Models\GroupLazyDisabled;


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

}
