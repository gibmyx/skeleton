<?php

namespace Skeleton\App\Usuarios\Application\Handler;

use Skeleton\App\Usuarios\Application\Validation\CrearUsuarioValidation;
use Skeleton\App\Usuarios\Domain\Entity\UsuarioEntity;
use Skeleton\App\Usuarios\Domain\Repository\UsuarioRepository;
use Skeleton\Shared\Application\Command\Command;
use Skeleton\Shared\Application\Handler\Hendler;

class CrearUsuarioHandler implements Hendler
{
    private $repository;
    private $crearUsuarioValidation;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command)
    {

        $usuario = new UsuarioEntity(
            $command->getEmail(),
            $command->getName(),
            $command->getPassword()
        );

        $this->repository->save($usuario);
    }
}
