<?php

namespace Skeleton\App\Categorias\Domain\Repository;

use Illuminate\Pagination\LengthAwarePaginator;
use Skeleton\App\Categorias\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Domain\Entity\CategoriaEntity;
use Skeleton\Shared\Application\Command\Command;

interface CategoriaRepository
{
    public function save(Categoria $categoria) : void;
    public function FindUuid(string $categoria) : Categoria;
    public function FindId(string $entity) : Categoria;
    public function update(CategoriaEntity $entity) : void;
    public function searchList(Command $command): LengthAwarePaginator;
}
