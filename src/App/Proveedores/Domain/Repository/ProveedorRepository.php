<?php

namespace Skeleton\App\Proveedores\Domain\Repository;

use Illuminate\Pagination\LengthAwarePaginator;
use Skeleton\App\Proveedores\Infrastructure\Models\Proveedor;
use Skeleton\App\Proveedores\Domain\Entity\ProveedorEntity;
use Skeleton\Shared\Application\Command\Command;

interface ProveedorRepository
{
    public function save(ProveedorEntity $entity) : void;
    public function FindUuid(string $entity) : Proveedor;
    public function update(ProveedorEntity $entity) : void;
    public function delete(ProveedorEntity $entity) : void;
    public function searchList(Command $command): LengthAwarePaginator;
}
