<?php


declare(strict_types=1);


namespace Skeleton\App\Articulos\Infrastructure\Models;


use Illuminate\Database\Eloquent\Model;
use Skeleton\App\Articulos\Infrastructure\Filters\ArticulosQueryFilters;
use Skeleton\App\Categorias\Infrastructure\Models\Categoria;


final class Articulo extends Model
{
    protected $table = 'articulos';
    protected $fillable = [
        'categoria_id',
        'uuid',
        'codigo',
        'nombre',
        'precio_venta',
        'stock',
        'descripcion',
        'estado',
    ];

    public function scopeDeFiltro($query, $campo)
    {
        $queryFilter = new ArticulosQueryFilters();
        return $queryFilter->apply($query, $campo);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }



}
