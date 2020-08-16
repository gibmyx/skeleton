<?php


namespace Skeleton\App\Articulos\Infrastructure\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Skeleton\App\Articulos\Application\Command\ListarArticulosCommand;
use Skeleton\Shared\Domain\Bus\CommandBus;


class ListarArticulosController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function __invoke(Request $request) : JsonResponse
    {
        $command = new ListarArticulosCommand(
            $request->input('page'),
            $request->input('params')
        );

        $response = $this->comandBus->dispatch($command);
        return response()->json($response);
    }
}
