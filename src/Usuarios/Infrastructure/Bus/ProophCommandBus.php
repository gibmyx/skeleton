<?php


namespace Skeleton\Usuarios\Infrastructure\Bus;


use Skeleton\Usuarios\Application\Command\Contracts\Command;
use Skeleton\Usuarios\Domain\Bus\CommandBus;

class ProophCommandBus implements CommandBus
{

    private $bus;
    private $router;

    public function execute(Command $command)
    {
        // TODO: Implement execute() method.
    }
}
