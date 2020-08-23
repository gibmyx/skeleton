<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Application\Command;


use Skeleton\Shared\Application\Command\Command;

final class CrearCategoriaCommand implements Command
{
    private $detalle;
    private $uuid;

    public function __construct(string $uuid, array $detalle)
    {
        $this->detalle = $detalle;
        $this->uuid = $uuid;
    }

    public function detalle(): array
    {
        return $this->detalle;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }
}
