<?php

namespace Skeleton\Shared\Domain\Bus;

interface CommandBus
{
    public function dispatch($command);
}

