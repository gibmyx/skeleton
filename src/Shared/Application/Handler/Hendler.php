<?php

namespace Skeleton\Shared\Application\Handler;

use Skeleton\Shared\Application\Command\Command;

interface Hendler
{
    public function __invoke(Command $command);
}
