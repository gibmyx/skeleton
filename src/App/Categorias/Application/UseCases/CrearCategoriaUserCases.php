<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Application\UseCases;


use Skeleton\App\Categorias\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Infrastructure\Doctrine\CategoriaDoctrineRepository;
use Skeleton\Shared\Application\Command\Command;

final class CrearCategoriaUserCases
{
    private $repository;

    public function __construct(CategoriaDoctrineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command)
    {
        $categoria = Categoria::take(
            $command->Uuid(),
            $command->Nombre(),
            $command->Descripcion(),
            $command->Estado()
        );

        $this->repository->save($categoria);
    }

}
