<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

use Cviebrock\EloquentLogLazyLoading\LazyLoadingException;
use Cviebrock\EloquentLogLazyLoading\Test\Models\GroupLazyDisabled;


class DisableLoadingTest extends TestCase
{

    public function testDisabling()
    {
        $group = GroupLazyDisabled::first();

        $this->expectException(LazyLoadingException::class);

        $users = $group->users;
    }

}
