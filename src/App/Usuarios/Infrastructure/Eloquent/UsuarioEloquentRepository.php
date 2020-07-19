<?php

namespace Skeleton\App\Usuarios\Infrastructure\Eloquent;

use App\User;
use Skeleton\App\Usuarios\Domain\Entity\UsuarioEntity;
use Skeleton\App\Usuarios\Domain\Repository\UsuarioRepository;

class UsuarioEloquentRepository implements UsuarioRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function save(UsuarioEntity $usuario): void
    {
        $this->model->create($usuario->getCreate());
    }

    public function update(UsuarioEntity $usuario): void
    {
        $objet = $this->model::where('id', $usuario->getId())->first();
        $objet->update($usuario->getCreate());
    }

    public function delete(UsuarioEntity $usuario): void
    {
        $objet = $this->model::where('id', $usuario->getId())->first();
        $objet->delete();
    }
}
