<?php

namespace App\Http\Controllers\Authorization;

use Skeleton\App\Authorization\Application\Command\LoginCommand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prooph\ServiceBus\CommandBus;

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

        $this->comandBus->dispatch($command);
    }
}
