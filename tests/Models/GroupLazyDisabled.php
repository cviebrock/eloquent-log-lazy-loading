<?php namespace Cviebrock\EloquentLogLazyLoading\Test\Models;

class GroupLazyDisabled extends Group
{
    protected $disableLazyLoading = true;
}
