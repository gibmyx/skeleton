<?php


declare(strict_types=1);


namespace Skeleton\App\Categorias\Infrastructure\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Skeleton\App\Categorias\Application\Command\CategoriaCommand;
use Skeleton\App\Categorias\Application\UseCases\CrearCategoriaUserCases;
use Skeleton\App\Categorias\Application\UseCases\ActualizarCategoriaUserCases;


final class GuardarController extends Controller
{
    private $crearUserCases;
    private $actualizarUserCases;

    public function __construct(CrearCategoriaUserCases $crearUserCases, ActualizarCategoriaUserCases $actualizarUserCases)
    {
        $this->crearUserCases = $crearUserCases;
        $this->actualizarUserCases = $actualizarUserCases;
    }

    public function __invoke(string $uuid, Request $request) : JsonResponse
    {
        $error = '';
        try {

            $categoriaCommand = CategoriaCommand::take(
                $uuid,
                $request->input('nombre'),
                $request->input('descripcion'),
                $request->input('estado')
            );

            $id = $request->input('id', '');

            if(empty($id))
                $this->crearUserCases->__invoke($categoriaCommand);

            if(!empty($id))
                $this->actualizarUserCases->__invoke($categoriaCommand);


        } catch (\Exception $e) {
            $error .= $e->getMessage();
        }

        $response = [
            'message' => strlen($error) ? $error : 'Articulo guardado con exito.',
            'code' => strlen($error) ? 401 : 201,
            'name' => 'categorias'
        ];
        return response()->json($response, $response['code']);
    }


}
