<?php

namespace Skeleton\Usuarios\Application\Container;

use Skeleton\Usuarios\Application\Container\Contracts\Container;
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
