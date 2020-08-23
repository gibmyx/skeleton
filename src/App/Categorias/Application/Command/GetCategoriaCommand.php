<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Application\Command;


use Skeleton\Shared\Application\Command\Command;

final class GetCategoriaCommand implements Command
{

    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }
}
