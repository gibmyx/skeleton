<?php
Route::get('/articulos/ajax_listar_articulos', 'Articulos\Infrastructure\Controllers\ListarArticulosController@__invoke');
Route::get('/articulos/ajax_get_catalogos', 'Articulos\Infrastructure\Controllers\GetCatalogosController@__invoke');
Route::post('/articulos/ajax_guardar/{uuid}', 'Articulos\Infrastructure\Controllers\GuardarController@__invoke');
Route::get('/articulos/ajax_get_detalle/{uuid}', 'Articulos\Infrastructure\Controllers\GetDetalleController@__invoke');
