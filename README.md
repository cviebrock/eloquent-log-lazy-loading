# Eloquent Log Lazy Loading

> [!WARNING]
> This package is abandonned as it hasn't been updated since Laravel 5,
> and the functionality has been baked into recent versions of Laravel via the
> [Model::handleLazyLoadingViolationUsing](https://laravel.com/docs/9.x/eloquent-relationships#preventing-lazy-loading) method.

---

Log (or disable) Eloquent lazy-loaded relationships in Laravel 5 to speed up your application.

[![Build Status](https://travis-ci.org/cviebrock/eloquent-log-lazy-loading.svg?branch=master&format=flat)](https://travis-ci.org/cviebrock/eloquent-log-lazy-loading)
[![Latest Stable Version](https://poser.pugx.org/cviebrock/eloquent-log-lazy-loading/v/stable?format=flat)](https://packagist.org/packages/cviebrock/eloquent-log-lazy-loading)
[![Latest Unstable Version](https://poser.pugx.org/cviebrock/eloquent-log-lazy-loading/v/unstable?format=flat)](https://packagist.org/packages/cviebrock/eloquent-log-lazy-loading)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cviebrock/eloquent-log-lazy-loading/badges/quality-score.png?format=flat)](https://scrutinizer-ci.com/g/cviebrock/eloquent-log-lazy-loading)
[![Total Downloads](https://poser.pugx.org/cviebrock/eloquent-log-lazy-loading/downloads?format=flat)](https://packagist.org/packages/cviebrock/eloquent-log-lazy-loading)
[![License](https://poser.pugx.org/cviebrock/eloquent-log-lazy-loading/license?format=flat)](https://packagist.org/packages/cviebrock/eloquent-log-lazy-loading)


- [Eloquent Log Lazy Loading](#eloquent-log-lazy-loading)
  - [Why You Might Want This Package](#why-you-might-want-this-package)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Bugs, Suggestions and Contributions](#bugs-suggestions-and-contributions)
  - [Copyright and License](#copyright-and-license)


---

## Why You Might Want This Package

Eloquent's lazy-loading is great.  You can do `Group::find($id)` in your controller, and then loop through 
`$group->users` in your template without needing to worry about the database queries that run under-the-hood.

The problem comes when you try and loop through `$group->users->addresses`, or some other relation. You may
inadvertently be running an SQL query for each iteration of that loop. If you are running a site that gets
millions of hits a day, this might not be a good thing!

By logging where your script is lazy-loading relationships, you may be able to optimize your application to avoid
unnecessary database calls. At the very least you can see where the bottlenecks are. And, if you want, you can
disable lazy-loading entirely and only allow explicitly loaded relations from being accessed.


## Installation

Install the package via composer:

```sh
$ composer require cviebrock/eloquent-log-lazy-loading
```

That's it!


## Usage

Your models should use the `LogLazyLoading` trait:

```php
use Cviebrock\EloquentLogLazyLoading\LogLazyLoading;

class MyModel extends Eloquent
{
    use LogLazyLoading;
}
```

When you attempt to lazy load a relationship, the package will report a `LazyLoadingException` exception and continue 
normally (i.e. it will load the relationship).  This is a great way to check where your application is doing
lazy-loading and allows you to refactor, possibly reducing the number of database queries that are called.

However, if you really want to go hard core and halt your application when a relation is lazy-loaded, then just 
set the `disableLazyLoading` property on your model to `true`.  The exception will be thrown, and not just reported.

```php
use Cviebrock\EloquentLogLazyLoading\LogLazyLoading;

class MyModel extends Eloquent
{
    use LogLazyLoading;
    
    protected $disableLazyLoading = true;
}
```


## Bugs, Suggestions and Contributions

Thanks to [everyone](https://github.com/cviebrock/eloquent-log-lazy-loading/graphs/contributors)
who has contributed to this project.

Please use [Github](https://github.com/cviebrock/eloquent-log-lazy-loading) for reporting bugs, 
and making comments or suggestions.
 
See [CONTRIBUTING.md](CONTRIBUTING.md) for how to contribute changes.


## Copyright and License

[eloquent-taggable](https://github.com/cviebrock/eloquent-log-lazy-loading)
was written by [Colin Viebrock](http://viebrock.ca) and is released under the 
[MIT License](LICENSE.md).

Copyright (c) 2017 Colin Viebrock
