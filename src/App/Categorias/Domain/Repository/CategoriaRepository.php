<?php

namespace Skeleton\App\Categorias\Domain\Repository;

interface CategoriaRepository
{
    public function create($data);

    public function update($data, $id);

    public function save($object);

    public function delete($object);

    public function find($id);

    public function FindUuid($uuid);

    public function findAll();
}
