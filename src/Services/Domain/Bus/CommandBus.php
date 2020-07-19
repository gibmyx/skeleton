<?php

namespace Skeleton\Services\Domain\Bus;

interface CommandBus
{
    public function execute($command);
}

