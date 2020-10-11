<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Infrastructure\Doctrine;


use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Skeleton\App\Articulos\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Domain\Entity\CategoriaEntity;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Application\Command\Command;

final class CategoriaDoctrineRepository implements CategoriaRepository
{

    public function save(Categoria $categoria): void
    {
        EntityManager::persist($categoria);
        EntityManager::flush();
    }

    public function FindUuid(string $entity): Categoria
    {
        // TODO: Implement FindUuid() method.
    }

    public function FindId(string $entity): Categoria
    {
        // TODO: Implement FindId() method.
    }

    public function update(CategoriaEntity $entity): void
    {
        // TODO: Implement update() method.
    }

    public function searchList(Command $command): LengthAwarePaginator
    {
        // TODO: Implement searchList() method.
    }
}
