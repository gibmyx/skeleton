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
require base_path('/app/Http/Controllers/User/Routes/ApiRoutes.php');
require base_path('/app/Http/Controllers/Authorization/Routes/ApiRoutes.php');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
