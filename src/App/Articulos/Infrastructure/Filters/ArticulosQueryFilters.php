<?php


declare(strict_types=1);


namespace Skeleton\App\Articulos\Infrastructure\Filters;


use Skeleton\Shared\Infrastructure\Filters\QueryFilters;

final class ArticulosQueryFilters extends QueryFilters
{
    public function nombre($value)
    {
        return $this->builder->where('articulos.nombre', 'like', "%{$value}%");
    }

    public function descripcion($value)
    {
        return $this->builder->where('articulos.descripcion', 'like', "%{$value}%");
    }

    public function codigo($value)
    {
        return $this->builder->where('articulos.codigo', 'like', "%{$value}%");
    }

    public function monto_desde($value)
    {
        return $this->builder->where('articulos.precio_venta', '>=', $value);
    }

    public function monto_hasta($value)
    {
        return $this->builder->where('articulos.precio_venta', '<=', $value);
    }

}
