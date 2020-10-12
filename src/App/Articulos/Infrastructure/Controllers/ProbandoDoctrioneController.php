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
            '30ce1b55-325a-454d-aabb-b1d24254b758',
            '',
            '',
            ''
        );
        $categoria = $this->categoriaUserCases->__invoke($categoria2Command);


        dd('fin');
    }
}
