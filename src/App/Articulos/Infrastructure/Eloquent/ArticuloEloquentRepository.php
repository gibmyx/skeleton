<?php

namespace Skeleton\App\Usuarios\Infrastructure\Eloquent;

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

    public function search(Command $command): Articulo
    {
        return $this->model::DeFiltro($command->campos())->get();
    }
}
