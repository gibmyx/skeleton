<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Application\Handler;


use Skeleton\App\Categorias\Domain\Entity\CategoriaEntity;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Application\Command\Command;
use Skeleton\Shared\Application\Handler\Hendler;

final class CrearCategoriaHandler implements Hendler
{
    private $repository;

    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command) : void
    {
        $articulo = new CategoriaEntity(
            $command->uuid(),
            $command->detalle()
        );
        $this->repository->save($articulo);
    }
}
