<?php

namespace Skeleton\Usuarios\Application\Command;

use Illuminate\Support\Facades\Hash;
use Skeleton\Usuarios\Application\Command\Contracts\Command;

class CrearUsuarioCommand implements Command
{

    private $email;
    private $name;
    private $password;

    public function __construct($email, $name, $password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
