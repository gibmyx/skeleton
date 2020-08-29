<?php

declare(strict_types=1);


namespace Skeleton\App\Proveedores\Infrastructure\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Skeleton\App\Proveedores\Application\Command\GetProveedorCommand;
use Skeleton\Shared\Domain\Bus\CommandBus;

final class GetDetalleController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function __invoke(string $uuid) : JsonResponse
    {
        $error = '';
        $data = [];
        try {
            $command = new GetProveedorCommand(
                $uuid
            );
            $data = $this->comandBus->dispatch($command);
        } catch (\Exception $e) {
            $error .= $e->getMessage();
        }

        return response()->json($data);
    }
}
