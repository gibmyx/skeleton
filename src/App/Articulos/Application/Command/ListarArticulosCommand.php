<?php


namespace Skeleton\App\Articulos\Application\Command;


use Skeleton\Shared\Application\Command\Command;


class ListarArticulosCommand implements Command
{
    private $page;
    private $campos;

    public function __construct(string $page, array $campos)
    {
        $this->page = $page;
        $this->campos = $campos;
    }

    public function page(): string
    {
        return $this->page;
    }

    public function campos(): array
    {
        return $this->campos;
    }
}
