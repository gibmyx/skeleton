<?php


namespace Skeleton\App\Proveedores\Infrastructure\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Skeleton\App\Proveedores\Application\Command\ListarProveedoresCommand;
use Skeleton\Shared\Domain\Bus\CommandBus;


class ListarController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function __invoke(Request $request) : JsonResponse
    {
        $command = new ListarProveedoresCommand(
            $request->input('page'),
            $request->input('params')
        );

        $response = $this->comandBus->dispatch($command);
        return response()->json($response);
    }
}
