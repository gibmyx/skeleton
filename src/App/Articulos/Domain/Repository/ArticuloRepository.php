<?php

namespace Skeleton\App\Articulos\Domain\Repository;

use Illuminate\Pagination\LengthAwarePaginator;
use Skeleton\App\Articulos\Infrastructure\Models\Articulo;
use Skeleton\App\Articulos\Domain\Entity\ArticuloEntity;
use Skeleton\Shared\Application\Command\Command;

interface ArticuloRepository
{
    public function save(ArticuloEntity $entity) : void;
    public function FindUuid(string $entity) : Articulo;
    public function update(ArticuloEntity $entity) : void;
    public function delete(ArticuloEntity $entity) : void;
    public function searchList(Command $command): LengthAwarePaginator;
}
