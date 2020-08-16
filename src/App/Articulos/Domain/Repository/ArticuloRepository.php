<?php

namespace Skeleton\App\Articulos\Domain\Repository;

use Illuminate\Pagination\LengthAwarePaginator;
use Skeleton\App\Articulos\Infrastructure\Models\Articulo;
use Skeleton\App\Articulos\Domain\Entity\ArticuloEntity;
use Skeleton\Shared\Application\Command\Command;

interface ArticuloRepository
{
    public function save(ArticuloEntity $article) : void;
    public function update(ArticuloEntity $article) : void;
    public function delete(ArticuloEntity $article) : void;
    public function searchList(Command $command): LengthAwarePaginator;
}
