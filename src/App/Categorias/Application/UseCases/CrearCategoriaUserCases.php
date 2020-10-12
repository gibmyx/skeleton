<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Application\UseCases;


use Carbon\Carbon;
use Skeleton\App\Categorias\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Application\Command\Command;

final class CrearCategoriaUserCases
{
    private $repository;

    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command)
    {
        $categoria = Categoria::take(
            $command->Uuid(),
            $command->Nombre(),
            $command->Descripcion(),
            $command->Estado(),
            Carbon::now(),
            Carbon::now()
        );

        $this->repository->save($categoria);
    }

}
