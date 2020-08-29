<?php

declare(strict_types=1);


namespace Skeleton\App\Proveedores\Application\Handler;


use Skeleton\App\Proveedores\Domain\Entity\ProveedorEntity;
use Skeleton\App\Proveedores\Domain\Repository\ProveedorRepository;
use Skeleton\Shared\Application\Command\Command;
use Skeleton\Shared\Application\Handler\Hendler;

final class ActualizarProveedorHandler implements Hendler
{
    private $repository;

    public function __construct(ProveedorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command) : void
    {
        $articulo = new ProveedorEntity(
            $command->uuid(),
            $command->detalle()
        );
        $this->repository->update($articulo);
    }
}
