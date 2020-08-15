<?php

namespace Skeleton\Share\Domain\Bus;

interface CommandBus
{
    public function dispatch($command);
}

