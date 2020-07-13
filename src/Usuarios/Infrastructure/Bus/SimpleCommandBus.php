<?php

namespace Skeleton\Usuarios\Infrastructure\Bus;

use Skeleton\Usuarios\Application\Container\Contracts\Container;
use Skeleton\Usuarios\Domain\Bus\CommandBus;
use Skeleton\Usuarios\Application\Command\Contracts\Command;

final class SimpleCommandBus implements CommandBus
{

    private const COMMAND_PREFID = 'Command';
    private const HANDLER_PREFIX = 'Handler';

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function execute(Command $command)
    {
        return $this->resolveHandler($command)->__invoke($command);
    }

    private function resolveHandler(Command $command)
    {
        return $this->container->make( $this->getHandlerClass($command) );
    }

    private function getHandlerClass(Command $command): string
    {
        return str_replace(
            self::COMMAND_PREFID,
            self::HANDLER_PREFIX,
            get_class($command)
        );
    }
}
