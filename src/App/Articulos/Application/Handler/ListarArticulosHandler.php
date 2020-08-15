<?php


namespace Skeleton\App\Usuarios\Application\Handler;


use Skeleton\App\Articulos\Domain\Repository\ArticuloRepository;
use Skeleton\Shared\Application\Command\Command;
use Skeleton\Shared\Application\Handler\Hendler;


class ListarArticulosHandler implements Hendler
{
    private $repository;

    public function __construct(ArticuloRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command): array
    {
        $objets = $this->repository->search($command);
        return [];
    }
}
