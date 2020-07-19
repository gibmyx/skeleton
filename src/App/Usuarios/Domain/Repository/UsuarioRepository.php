<?php

namespace Skeleton\App\Usuarios\Domain\Repository;

use Skeleton\App\Usuarios\Domain\Entity\UsuarioEntity;

interface UsuarioRepository
{
    public function save(UsuarioEntity $article) : void;
    public function update(UsuarioEntity $article) : void;
    public function delete(UsuarioEntity $article) : void;
}
