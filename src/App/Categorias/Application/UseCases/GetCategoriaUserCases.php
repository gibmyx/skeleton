<?php

declare(strict_types=1);

namespace Skeleton\App\Categorias\Application\UseCases;

use Skeleton\App\Categorias\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Application\Command\Command;

final class GetCategoriaUserCases
{
    private $repository;

    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command): ?array
    {
        $categoria = $this->repository->FindUuid($command->Uuid());

        if (is_null($categoria))
            return [];

        return [
            'id' => $categoria->getId(),
            'uuid' => $categoria->getUuid(),
            'estado' => $categoria->getEstado(),
            'nombre' => $categoria->getNombre(),
            'descripcion' => $categoria->getDescripcion(),
            'created_at' => $categoria->getCreatedAt(),
            'updated_at' => $categoria->getUpdatedAt(),
        ];
    }
}
