<?php

namespace Skeleton\App\Proveedores\Infrastructure\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Skeleton\App\Proveedores\Infrastructure\Models\Proveedor;
use Skeleton\App\Proveedores\Domain\Entity\ProveedorEntity;
use Skeleton\App\Proveedores\Domain\Repository\ProveedorRepository;
use Skeleton\Shared\Application\Command\Command;

class ProveedorEloquentRepository implements ProveedorRepository
{
    private $model;

    public function __construct(Proveedor $model)
    {
        $this->model = $model;
    }

    public function save(ProveedorEntity $entity): void
    {
        $this->model->create(array_filter($entity->detalle()));
    }


    public function FindUuid(string $uuid): Proveedor
    {
        return Proveedor::where('uuid', $uuid)->first();
    }

    public function update(ProveedorEntity $entity): void
    {
        $objet = $this->model::where('uuid', $entity->uuid())->first();
        $objet->update($entity->detalle());
    }

    public function delete(ProveedorEntity $entity): void
    {
        $objet = $this->model::where('id', $entity->getId())->first();
        $objet->delete();
    }

    public function searchList(Command $command) : LengthAwarePaginator
    {
        return $this->model::DeFiltro($command->campos())->orderBy('id', 'desc')->paginate(5);
    }
}
