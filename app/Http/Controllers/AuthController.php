<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Prooph\ServiceBus\CommandBus;
use Skeleton\Usuarios\Application\Command\CrearUsuarioCommand;
//use Skeleton\Usuarios\Domain\Bus\CommandBus;

class AuthController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }

    public function login(Request $request)
    {
        $http = new Client;
        try {

            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);

            return $response->getBody();

        } catch (BadResponseException $e) {

            if ($e->getCode() === 400) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            }

            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Logged out successfully', 200);
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
