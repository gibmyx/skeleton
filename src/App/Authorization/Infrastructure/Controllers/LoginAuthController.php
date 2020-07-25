<?php


namespace Skeleton\App\Authorization\Infrastructure\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Skeleton\App\Authorization\Application\Command\LoginCommand;
use Skeleton\Services\Domain\Bus\CommandBus;

class LoginAuthController extends Controller
{
    private $comandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->comandBus = $commandBus;
    }
    public function login(Request $request)
    {
        $command = new LoginCommand(
            $request->username,
            $request->password
        );
        return $this->comandBus->dispatch($command);
    }
}
