<?php

namespace Skeleton\Shared\Infrastructure\Bus;

use Skeleton\Shared\Application\Container\Contracts\Container;
use Skeleton\Shared\Domain\Bus\CommandBus;

final class SimpleCommandBus implements CommandBus
{

    private const COMMAND_PREFID = 'Command';
    private const HANDLER_PREFIX = 'Handler';

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function dispatch($command)
    {
        return $this->resolveHandler($command)->__invoke($command);
    }

    private function resolveHandler($command)
    {
        return $this->container->make( $this->getHandlerClass($command) );
    }

    private function getHandlerClass($command): string
    {
        return str_replace(
            self::COMMAND_PREFID,
            self::HANDLER_PREFIX,
            get_class($command)
        );
    }
}
