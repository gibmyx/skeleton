<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Application\UseCases;


use Skeleton\App\Categorias\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Application\Command\Command;

final class ActualizarCategoriaUserCases
{
    private $repository;

    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command)
    {
        $this->repository->update($command);
    }

}
