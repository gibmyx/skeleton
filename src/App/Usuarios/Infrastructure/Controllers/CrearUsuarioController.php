<?php


namespace Skeleton\App\Usuarios\Infrastructure\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Prooph\ServiceBus\CommandBus;
use Skeleton\App\Usuarios\Application\Command\CrearUsuarioCommand;

class CrearUsuarioController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function register(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $error = '';
        try {

            $command = new CrearUsuarioCommand(
                $request->input('email'),
                $request->input('name'),
                Hash::make($request->input('password'))
            );
            $this->comandBus->dispatch($command);

        } catch (\Exception $e) {
            $error .= $e->getMessage();
        }
        $response = [
            'message' => strlen($error) ? $error : 'Usuario creado con exito.',
            'code' => strlen($error) ? 401 : 201,
        ];
        return response()->json($response, $response['code']);
    }
}
