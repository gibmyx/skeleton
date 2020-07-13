<?php

namespace Skeleton\Usuarios\Domain\Repository;

use Skeleton\Usuarios\Domain\Entity\UsuarioEntity;

interface UsuarioRepository
{
    public function save(UsuarioEntity $article) : void;
    public function update(UsuarioEntity $article) : void;
    public function delete(UsuarioEntity $article) : void;
}
