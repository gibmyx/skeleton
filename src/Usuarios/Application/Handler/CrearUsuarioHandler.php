<?php

namespace Skeleton\Usuarios\Application\Handler;

use Skeleton\Usuarios\Application\Handler\Contracts\Hendler;
use Skeleton\Usuarios\Domain\Entity\UsuarioEntity;
use Skeleton\Usuarios\Domain\Repository\UsuarioRepository;

class CrearUsuarioHandler implements Hendler
{
    private $repository;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($command)
    {

        $article = new UsuarioEntity(
            $command->getEmail(),
            $command->getName(),
            $command->getPassword()
        );

        $this->repository->save($article);
    }
}
