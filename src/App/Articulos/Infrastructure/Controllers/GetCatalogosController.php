<?php


namespace Skeleton\App\Articulos\Infrastructure\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Skeleton\App\Categorias\Infrastructure\Models\Categoria;
use Skeleton\Shared\Domain\Bus\CommandBus;

class GetCatalogosController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function __invoke(Request $request) : JsonResponse
    {
        $categoria = Categoria::get()->map(function (Categoria $categoria) {
            return [
              'id' => $categoria->id,
              'text' => $categoria->nombre
            ];
        });
        $response = [
            'categorias' => $categoria
        ];
        return response()->json($response);
    }
}
