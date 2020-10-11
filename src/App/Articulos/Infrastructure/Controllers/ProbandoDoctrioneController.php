<?php


namespace Skeleton\App\Articulos\Infrastructure\Controllers;


use LaravelDoctrine\ORM\Facades\EntityManager;
use Skeleton\App\Categorias\Application\UseCases\GetCategoriaUserCases;
use Skeleton\App\Categorias\Application\UseCases\CrearCategoriaUserCases;
use Skeleton\App\Categorias\Application\Command\CategoriaCommand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;

class ProbandoDoctrioneController extends Controller
{
    private $userCases;
    private $categoriaUserCases;

    public function __construct(CrearCategoriaUserCases $userCases, GetCategoriaUserCases $categoriaUserCases){

        $this->userCases = $userCases;
        $this->categoriaUserCases = $categoriaUserCases;
    }

    public function __invoke(Request $request)
    {

//        Crear
        $categoriaCommand = CategoriaCommand::take(
            Uuid::generate()->string,
            'Categoria',
            'esta es la descripcion',
            'activo'
        );
        $this->userCases->__invoke($categoriaCommand);

//        Actualizar
        $categoria = null;
        $categoria2Command = CategoriaCommand::take(
            '889449f0-0bdc-11eb-b2ff-5b6c7bb1ae7f',
            '',
            '',
            ''
        );
        $categoria = $this->categoriaUserCases->__invoke($categoria2Command);


        dd('fin');
    }
}
