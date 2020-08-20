<?php

declare(strict_types=1);


namespace Skeleton\App\Articulos\Infrastructure\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Skeleton\App\Articulos\Infrastructure\Models\Articulo;

final class GuardarItemsController extends Controller
{
    public function __invoke(Request $request)
    {
        Articulo::create([
            'uuid' => $request->input('uuid'),
            'nombre' => $request->input('juegos'),
            'precio_venta' => $request->input('precio_venta'),
            'descripcion' => $request->input('descripcion'),
            'codigo' => $request->input('codigo'),
            'stock' => $request->input('stock'),
            'categoria_id' => $request->input('categoria_id')
        ]);
        return response()->json(['respuesta' => 'Hola']);
    }

}
