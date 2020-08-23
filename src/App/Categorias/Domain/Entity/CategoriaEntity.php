<?php

namespace Skeleton\App\Categorias\Domain\Entity;


final class CategoriaEntity
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
