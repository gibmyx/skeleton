<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/passport', function (){
    return view('passport');
});

require base_path('/src/App/Articulos/Infrastructure/Routes/routesWeb.php');

Route::get('/{any?}', function (){
    return view('app');
})->where('any', '^(?!api\/)[\/\w\.-]*');
