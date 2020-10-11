<?php


namespace Skeleton\App\Articulos\Infrastructure\Controllers;


use Skeleton\App\Categorias\Application\UseCases\CrearCategoriaUserCases;
use Skeleton\App\Categorias\Application\Command\CategoriaCommand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Skeleton\App\Articulos\Domain\Entities\Categoria;
use Webpatser\Uuid\Uuid;

class ProbandoDoctrioneController extends Controller
{
    private $userCases;

    public function __construct(CrearCategoriaUserCases $userCases){

        $this->userCases = $userCases;
    }

    public function __invoke(Request $request)
    {

        $categoriaCommand = CategoriaCommand::take(
            Uuid::generate()->string,
            'Categoria',
            'esta es la descripcion',
            'activo'
        );

        $this->userCases->__invoke($categoriaCommand);

        dd('stop');
    }
}
