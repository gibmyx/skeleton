<?php

namespace Skeleton\App\Usuarios\Application\Validation;

use Skeleton\App\Usuarios\Domain\Entity\ArticuloEntity;
use Skeleton\App\Usuarios\Domain\Repository\ArticuloRepository;

class CrearUsuarioValidation
{
    public function __construct(ArticuloRepository $repository)
    {
        $this->repository = $repository;
    }

    public function validation(ArticuloEntity $usuarioEntity)
    {
        $this->ValidateEmail($usuarioEntity);
    }

    private function ValidateEmail(ArticuloEntity $usuarioEntity)
    {
        $objet = $this->repository->findEmail($usuarioEntity);
        if(!empty($objet)){
            throw new \Exception("El correo ya fue utilizado previamente");
        }
    }
}
