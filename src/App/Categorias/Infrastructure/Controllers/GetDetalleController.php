<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Infrastructure\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Skeleton\App\Categorias\Application\Command\CategoriaCommand;
use Skeleton\App\Categorias\Application\Command\GetCategoriaCommand;
use Skeleton\App\Categorias\Application\UseCases\GetCategoriaUserCases;
use Skeleton\Shared\Domain\Bus\CommandBus;

final class GetDetalleController extends Controller
{
    private $getUserCases;

    public function __construct(GetCategoriaUserCases $getUserCases)
    {
        $this->getUserCases = $getUserCases;
    }

    public function __invoke(string $uuid): JsonResponse
    {
        $error = '';
        $data = [];
        try {

            $categoriaCommand = CategoriaCommand::take(
                $uuid
            );
            $data = $this->getUserCases->__invoke($categoriaCommand);

        } catch (\Exception $e) {
            $error .= $e->getMessage();
        }

        return response()->json($data);
    }
}
