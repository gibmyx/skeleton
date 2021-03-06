<?php

namespace Skeleton\App\Articulos\Domain\Entity;


final class ArticuloEntity
{

    private $uuid;
    private $detalle;

    public function __construct(string $uuid, array $detalle)
    {
        $this->uuid = $uuid;
        $this->detalle = $detalle;
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
