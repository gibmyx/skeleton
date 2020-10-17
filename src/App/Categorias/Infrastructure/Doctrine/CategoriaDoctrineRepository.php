<?php

declare(strict_types=1);

namespace Skeleton\App\Categorias\Infrastructure\Doctrine;

use Skeleton\App\Categorias\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\Shared\Infrastructure\Doctrine\DoctrineBaseRepository;

class CategoriaDoctrineRepository extends DoctrineBaseRepository implements CategoriaRepository
{

}
