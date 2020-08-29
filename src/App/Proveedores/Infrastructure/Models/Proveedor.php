<?php


declare(strict_types=1);


namespace Skeleton\App\Proveedores\Infrastructure\Models;


use Illuminate\Database\Eloquent\Model;
use Skeleton\App\Proveedores\Infrastructure\Filters\ProveedoresQueryFilters;


final class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = [
        'uuid',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email',
        'contacto',
        'telefono_contacto',
        'estado',
    ];

    public function scopeDeFiltro($query, $campo)
    {
        $queryFilter = new ProveedoresQueryFilters();
        return $queryFilter->apply($query, $campo);
    }

}
