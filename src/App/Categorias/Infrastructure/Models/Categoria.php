<?php


declare(strict_types=1);


namespace Skeleton\App\Categorias\Infrastructure\Models;


use Illuminate\Database\Eloquent\Model;
use Skeleton\App\Categorias\Infrastructure\Filters\CategoriasQueryFilters;


final class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
        'uuid',
        'nombre',
        'descripcion',
        'condicion',
    ];

    public function scopeDeFiltro($query, $campo)
    {
        $queryFilter = new CategoriasQueryFilters();
        return $queryFilter->apply($query, $campo);
    }

}
