<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
require base_path('/src/App/Usuarios/Infrastructure/Routes/routes.php');
require base_path('/src/App/Authorization/Infrastructure/Routes/routes.php');
require base_path('/src/App/Articulos/Infrastructure/Routes/routes.php');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
