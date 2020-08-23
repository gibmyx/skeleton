<?php


namespace Skeleton\App\Categorias\Infrastructure\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Skeleton\App\Categorias\Application\Command\ListarCategoriasCommand;
use Skeleton\Shared\Domain\Bus\CommandBus;


class ListarCategoriasController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function __invoke(Request $request) : JsonResponse
    {
        $command = new ListarCategoriasCommand(
            $request->input('page'),
            $request->input('params')
        );

        $response = $this->comandBus->dispatch($command);
        return response()->json($response);
    }
}
