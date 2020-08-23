<?php


declare(strict_types=1);


namespace Skeleton\App\Categorias\Infrastructure\Filters;


use Skeleton\Shared\Infrastructure\Filters\QueryFilters;

final class CategoriasQueryFilters extends QueryFilters
{
    public function nombre($value)
    {
        return $this->builder->where('categorias.nombre', 'like', "%{$value}%");
    }

    public function descripcion($value)
    {
        return $this->builder->where('categorias.descripcion', 'like', "%{$value}%");
    }
}
