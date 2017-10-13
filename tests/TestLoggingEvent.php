<?php namespace Cviebrock\EloquentLogLazyLoading\Test;

class TestLoggingEvent
{

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * TestLoggingEvent constructor.
     *
     * @param \Exception $exception
     */
    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }
}
