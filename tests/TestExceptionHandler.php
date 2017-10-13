<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;


class TestExceptionHandler extends Handler
{

    /**
     * @inheritdoc
     */
    public function report(Exception $e)
    {
        event(new TestLoggingEvent($e));

        parent::report($e);
    }
}
