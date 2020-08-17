<?php

declare(strict_types=1);


namespace Skeleton\App\Articulos\Application\Handler;


use Skeleton\App\Articulos\Domain\Entity\ArticuloEntity;
use Skeleton\App\Articulos\Domain\Repository\ArticuloRepository;
use Skeleton\Shared\Application\Command\Command;
use Skeleton\Shared\Application\Handler\Hendler;

final class CrearArticuloHandler implements Hendler
{
    private $repository;

    public function __construct(ArticuloRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command)
    {
        $articulo = new ArticuloEntity(
            $command->uuid(),
            $command->detalle()
        );
        $this->repository->save($articulo);
    }
}
