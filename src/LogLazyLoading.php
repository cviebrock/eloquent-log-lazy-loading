<?php namespace Cviebrock\EloquentLogLazyLoading;

trait LogLazyLoading
{

    /**
     * Get a relationship value from a method.
     *
     * @param  string $method
     *
     * @return mixed
     *
     * @throws \LogicException
     * @throws \Cviebrock\EloquentLogLazyLoading\LazyLoadingException
     */
    protected function getRelationshipFromMethod($method)
    {
        $modelName = static::class;

        $exception = new LazyLoadingException(
            "Attempting to lazy-load relation '$method' on model '$modelName'"
        );

        if (property_exists($this, 'disableLazyLoading') && $this->disableLazyLoading) {
            throw $exception;
        }

        report($exception);

        return parent::getRelationshipFromMethod($method);
    }
}
