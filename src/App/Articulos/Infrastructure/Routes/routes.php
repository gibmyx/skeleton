<?php
Route::get('/articulos/ajax_listar_articulos', 'Articulos\Infrastructure\Controllers\ListarArticulosController@__invoke');
Route::post('/articulos/ajax_get_catalogos', 'Articulos\Infrastructure\Controllers\GetCatalogosController@__invoke');
