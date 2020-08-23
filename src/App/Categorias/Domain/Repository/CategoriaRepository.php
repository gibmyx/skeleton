<?php

namespace Skeleton\App\Categorias\Domain\Repository;

use Illuminate\Pagination\LengthAwarePaginator;
use Skeleton\App\Categorias\Infrastructure\Models\Categoria;
use Skeleton\App\Categorias\Domain\Entity\CategoriaEntity;
use Skeleton\Shared\Application\Command\Command;

interface CategoriaRepository
{
    public function save(CategoriaEntity $entity) : void;
    public function FindUuid(string $entity) : Categoria;
    public function update(CategoriaEntity $entity) : void;
    public function delete(CategoriaEntity $entity) : void;
    public function searchList(Command $command): LengthAwarePaginator;
}
