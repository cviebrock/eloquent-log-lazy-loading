<?php namespace Cviebrock\EloquentLogLazyLoading;

trait LogLazyLoading
{

    /**
     * Whether to disable lazy-loading entirely (instead of just reporting it)
     * @var bool
     */
    protected $disableLazyLoading = false;

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

        if ($this->disableLazyLoading) {
            throw $exception;
        }

        report($exception);

        return parent::getRelationshipFromMethod($method);
    }
}
