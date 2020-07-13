<?php

namespace Skeleton\Usuarios\Domain\Entity;


final class UsuarioEntity
{
    private $id;
    private $email;
    private $name;
    private $password;

    public function __construct(string $email = '', string $name = '', string $password = '', int $id = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    public function getId(): string
    {
        return $this->id;
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

    public function getCreate(): array
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
            'password' => $this->password
        ];
    }
}
