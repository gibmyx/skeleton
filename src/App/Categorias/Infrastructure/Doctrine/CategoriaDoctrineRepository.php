<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Infrastructure\Doctrine;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Skeleton\App\Categorias\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Domain\Entity\CategoriaEntity;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Application\Command\Command;

final class CategoriaDoctrineRepository implements CategoriaRepository
{

    private $genericRepository;

    public function __construct(ObjectRepository $genericRepository)
    {
        $this->genericRepository = $genericRepository;
    }

    public function save(Categoria $categoria): void
    {
        EntityManager::persist($categoria);
        EntityManager::flush();
    }

    public function FindUuid(string $uuid): ?Categoria
    {
        return $this->genericRepository->findOneBy(['uuid' => $uuid]);
    }

    public function update(Categoria $categoria): void
    {
        // TODO: Implement update() method.
    }
}
