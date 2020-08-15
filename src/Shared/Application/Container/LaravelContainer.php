<?php

namespace Skeleton\Shared\Application\Container;

use Skeleton\Shared\Application\Container\Contracts\Container;
use Illuminate\Container\Container as IoC;

class LaravelContainer implements Container
{
    private $container;

    public function __construct(IoC $container)
    {
        $this->container = $container;
    }

    public function make($class)
    {
        return $this->container->make($class);
    }
}
