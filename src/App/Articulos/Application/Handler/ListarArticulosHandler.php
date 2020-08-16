<?php


namespace Skeleton\App\Articulos\Application\Handler;


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
            'articulos' => $objets->items(),
        ];
        return $data;
    }
}
