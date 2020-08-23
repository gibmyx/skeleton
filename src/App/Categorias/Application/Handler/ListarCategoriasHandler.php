<?php


namespace Skeleton\App\Categorias\Application\Handler;


use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Application\Command\Command;
use Skeleton\Shared\Application\Handler\Hendler;


class ListarCategoriasHandler implements Hendler
{
    private $repository;

    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command): array
    {
        $objets = $this->repository->searchList($command);
        $data = [
            'pagination' => [
                'total'         => $objets->total(),
                'current_page'  => $objets->currentPage(),
                'per_page'      => $objets->perPage(),
                'last_page'     => $objets->lastPage(),
                'from'          => $objets->firstItem(),
                'to'            => $objets->lastItem(),
            ],
            'categorias' => $objets->items(),
        ];
        return $data;
    }
}
