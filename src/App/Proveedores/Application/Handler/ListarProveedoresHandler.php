<?php


namespace Skeleton\App\Proveedores\Application\Handler;


use Skeleton\App\Proveedores\Domain\Repository\ProveedorRepository;
use Skeleton\Shared\Application\Command\Command;
use Skeleton\Shared\Application\Handler\Hendler;


class ListarProveedoresHandler implements Hendler
{
    private $repository;

    public function __construct(ProveedorRepository $repository)
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
            'proveedores' => $objets->items(),
        ];
        return $data;
    }
}
