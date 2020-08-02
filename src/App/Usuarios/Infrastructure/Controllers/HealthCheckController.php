<?php


namespace skeleton\App\Usuarios\Infrastructure\Controllers;


use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class HealthCheckController extends Controller
{
    public function health_check()
    {
        return new JsonResponse([
            'gibmyx-backend' => 'ok',
            'rand' => 1
        ]);
    }
}
