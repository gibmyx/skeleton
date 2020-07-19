<?php

namespace Skeleton\Services\Domain\Bus;

interface CommandBus
{
    public function dispatch($command);
}

