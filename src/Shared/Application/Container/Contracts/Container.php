<?php

namespace Skeleton\Shared\Application\Container\Contracts;

interface Container
{
    public function make($class);
}
