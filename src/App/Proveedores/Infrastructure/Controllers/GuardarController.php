<?php


declare(strict_types=1);


namespace Skeleton\App\Proveedores\Infrastructure\Controllers;


use Skeleton\App\Proveedores\Application\Command\CrearProveedorCommand;
use Skeleton\App\Proveedores\Application\Command\ActualizarProveedorCommand;
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
            $command = $this->getCommand($uuid, $request);
            $this->comandBus->dispatch($command);
        } catch (\Exception $e) {
            $error .= $e->getMessage();
        }
        $response = [
            'message' => strlen($error) ? $error : 'Proveedor guardado con exito.',
            'code' => strlen($error) ? 401 : 201,
            'name' => 'proveedores'
        ];
        return response()->json($response, $response['code']);
    }

    public function getCommand(string $uuid, Request $request)
    {
        $params = $request->input('params');
        return empty($params['id']) ?
            new CrearProveedorCommand(
                $uuid,
                $request->input('params')
            ) :
            new ActualizarProveedorCommand(
                $uuid,
                $request->input('params')
            );
    }

}
