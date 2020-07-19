<?php

namespace Skeleton\App\Usuarios\Application\Handler;

use Skeleton\App\Usuarios\Application\Validation\CrearUsuarioValidation;
use Skeleton\App\Usuarios\Application\Handler\Contracts\Hendler;
use Skeleton\App\Usuarios\Domain\Entity\UsuarioEntity;
use Skeleton\App\Usuarios\Domain\Repository\UsuarioRepository;

class CrearUsuarioHandler implements Hendler
{
    private $repository;
    private $crearUsuarioValidation;

    public function __construct(UsuarioRepository $repository, CrearUsuarioValidation $crearUsuarioValidation)
    {
        $this->repository = $repository;
        $this->crearUsuarioValidation = $crearUsuarioValidation;
    }

    public function __invoke($command)
    {

        $usuario = new UsuarioEntity(
            $command->getEmail(),
            $command->getName(),
            $command->getPassword()
        );
//        $this->crearUsuarioValidation->validation($usuario);
        $this->repository->save($usuario);
    }
}
