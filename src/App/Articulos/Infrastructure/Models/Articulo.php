<?php


declare(strict_types=1);


namespace Skeleton\App\Articulos\Infrastructure\Models;


use Illuminate\Database\Eloquent\Model;
use Skeleton\App\Articulos\Infrastructure\Filters\ArticulosQueryFilters;


final class Articulo extends Model
{
    protected $table = 'articulos';
    protected $fillable = [
        'categoria_id',
        'codigo',
        'nombre',
        'precio_venta',
        'stock',
        'descripcion',
        'condicion',
    ];

    public function scopeDeFiltro($query, $campo)
    {
        $queryFilter = new ArticulosQueryFilters();
        return $queryFilter->apply($query, $campo);
    }

}
