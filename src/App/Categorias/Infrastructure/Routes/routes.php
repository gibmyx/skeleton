<?php
Route::get('/categorias/ajax_listar_categorias', 'Categorias\Infrastructure\Controllers\ListarCategoriasController@__invoke');
Route::get('/categorias/ajax_get_catalogos', 'Categorias\Infrastructure\Controllers\GetCatalogosController@__invoke');
Route::post('/categorias/ajax_guardar/{uuid}', 'Categorias\Infrastructure\Controllers\GuardarController@__invoke');
Route::get('/categorias/ajax_get_detalle/{uuid}', 'Categorias\Infrastructure\Controllers\GetDetalleController@__invoke');
