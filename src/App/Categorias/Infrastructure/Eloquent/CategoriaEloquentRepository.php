<?php

namespace Skeleton\App\Categorias\Infrastructure\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Skeleton\App\Categorias\Infrastructure\Models\Categoria;
use Skeleton\App\Categorias\Domain\Entity\CategoriaEntity;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Application\Command\Command;

class CategoriaEloquentRepository implements CategoriaRepository
{
    private $model;

    public function __construct(Categoria $model)
    {
        $this->model = $model;
    }

    public function save(CategoriaEntity $entity): void
    {
        $this->model->create(array_filter($entity->detalle()));
    }


    public function FindUuid(string $uuid): Categoria
    {
        return Categoria::where('uuid', $uuid)->first();
    }

    public function update(CategoriaEntity $entity): void
    {
        $objet = $this->model::where('uuid', $entity->uuid())->first();
        $objet->update($entity->detalle());
    }

    public function delete(CategoriaEntity $entity): void
    {
        $objet = $this->model::where('id', $entity->getId())->first();
        $objet->delete();
    }

    public function searchList(Command $command) : LengthAwarePaginator
    {
        return $this->model::DeFiltro($command->campos())->orderBy('id', 'desc')->paginate(5);
    }
}
