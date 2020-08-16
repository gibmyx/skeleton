<?php

namespace Skeleton\App\Articulos\Infrastructure\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Skeleton\App\Articulos\Infrastructure\Models\Articulo;
use Skeleton\App\Articulos\Domain\Entity\ArticuloEntity;
use Skeleton\App\Articulos\Domain\Repository\ArticuloRepository;
use Skeleton\Shared\Application\Command\Command;

class ArticuloEloquentRepository implements ArticuloRepository
{
    private $model;

    public function __construct(Articulo $model)
    {
        $this->model = $model;
    }

    public function save(ArticuloEntity $usuario): void
    {
        $this->model->create($usuario->getCreate());
    }

    public function update(ArticuloEntity $usuario): void
    {
        $objet = $this->model::where('id', $usuario->getId())->first();
        $objet->update($usuario->getCreate());
    }

    public function delete(ArticuloEntity $usuario): void
    {
        $objet = $this->model::where('id', $usuario->getId())->first();
        $objet->delete();
    }

    public function searchList(Command $command) : LengthAwarePaginator
    {
        return $this->model::DeFiltro($command->campos())->paginate(5);
    }
}
