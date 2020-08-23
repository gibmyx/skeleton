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
            'articulos' => $objets->map(function ($articulos) {
                return[
                  'id' =>   $articulos->id,
                  'uuid' =>   $articulos->uuid,
                  'codigo' =>   $articulos->codigo,
                  'nombre' =>   $articulos->nombre,
                  'descripcion' =>   $articulos->descripcion,
                  'categoria' =>   $articulos->categoria->nombre,
                  'categoria_id' =>   $articulos->categoria_id,
                  'precio_venta' =>   $articulos->precio_venta,
                  'stock' =>   $articulos->stock,
                  'estado' =>   $articulos->estado,
                ];
            }),
        ];
        return $data;
    }
}
