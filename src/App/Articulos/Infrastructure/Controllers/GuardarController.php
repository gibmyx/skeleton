<?php


declare(strict_types=1);


namespace Skeleton\App\Articulos\Infrastructure\Controllers;


use Skeleton\App\Articulos\Application\Command\CrearArticuloCommand;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Skeleton\Shared\Domain\Bus\CommandBus;

final class GuardarController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function __invoke(string $uuid, Request $request) : JsonResponse
    {
        $error = '';
        try {
            $command = new CrearArticuloCommand(
                $uuid,
                $request->input('params')
            );
            $this->comandBus->dispatch($command);
        } catch (\Exception $e) {
            $error .= $e->getMessage();
        }
        $response = [
            'message' => strlen($error) ? $error : 'Articulo creado con exito.',
            'code' => strlen($error) ? 401 : 201,
            'name' => 'articulos'
        ];
        return response()->json($response, $response['code']);
    }

}
