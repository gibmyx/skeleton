<?php

namespace Skeleton\App\Usuarios\Application\Validation;

use Skeleton\App\Usuarios\Domain\Entity\UsuarioEntity;
use Skeleton\App\Usuarios\Domain\Repository\UsuarioRepository;

class CrearUsuarioValidation
{
    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function validation(UsuarioEntity $usuarioEntity)
    {
        $this->ValidateEmail($usuarioEntity);
    }

    private function ValidateEmail(UsuarioEntity $usuarioEntity)
    {
        $objet = $this->repository->findEmail($usuarioEntity);
        if(!empty($objet)){
            throw new \Exception("El correo ya fue utilizado previamente");
        }
    }
}
