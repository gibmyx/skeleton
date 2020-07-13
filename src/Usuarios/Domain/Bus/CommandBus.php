<?php

namespace Skeleton\Usuarios\Domain\Bus;

use Skeleton\Usuarios\Application\Command\Contracts\Command;

interface CommandBus
{
    public function execute(Command $command);
}

