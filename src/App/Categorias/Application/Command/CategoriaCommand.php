<?php

declare(strict_types=1);


namespace Skeleton\App\Categorias\Application\Command;


use Skeleton\Shared\Application\Command\Command;

final class CategoriaCommand implements Command
{

    private $uuid;
    private $nombre;
    private $descripcion;
    private $estado;

    private function __construct($uuid, $nombre, $descripcion, $estado)
    {
        $this->uuid = $uuid;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    public static function take ($uuid, $nombre, $descripcion, $estado): CategoriaCommand
    {
        return new CategoriaCommand($uuid, $nombre, $descripcion, $estado);
    }

    /**
     * @return mixed
     */
    public function Uuid()
    {
        return $this->uuid;
    }

    /**
     * @return mixed
     */
    public function Nombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function Descripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function Estado()
    {
        return $this->estado;
    }

}
