<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;


class TestExceptionHandler extends Handler
{
    public function report(Exception $e)
    {

    }
}
