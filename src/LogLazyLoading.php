<?php namespace Cviebrock\EloquentLogLazyLoading;

trait LogLazyLoading
{

    protected $disableLazyLoading = false;

    protected function getRelationshipFromMethod($method)
    {
        $modelName = static::class;

        $exception = new LazyLoadingException(
            "Attempting to lazy-load relation '$method' on model '$modelName'"
        );

        if ($this->disableLazyLoading) {
            throw $exception;
        }

        report($exception);

        return parent::getRelationshipFromMethod($method);
    }
}
