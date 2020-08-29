<?php


namespace Skeleton\App\Proveedores\Infrastructure\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
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
        dd('hola');
        $response = [];
        return response()->json($response);
    }
}
