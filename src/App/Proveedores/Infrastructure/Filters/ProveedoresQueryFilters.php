<?php


declare(strict_types=1);


namespace Skeleton\App\Proveedores\Infrastructure\Filters;


use Skeleton\Shared\Infrastructure\Filters\QueryFilters;

final class ProveedoresQueryFilters extends QueryFilters
{
    public function nombre($value)
    {
        return $this->builder->where('proveedores.nombre', 'like', "%{$value}%");
    }

    public function descripcion($value)
    {
        return $this->builder->where('proveedores.descripcion', 'like', "%{$value}%");
    }
}
