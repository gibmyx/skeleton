<?php
Route::get('/proveedores/ajax_listar_proveedores', 'Proveedores\Infrastructure\Controllers\ListarController@__invoke');
Route::get('/proveedores/ajax_get_catalogos', 'Proveedores\Infrastructure\Controllers\GetCatalogosController@__invoke');
Route::post('/proveedores/ajax_guardar/{uuid}', 'Proveedores\Infrastructure\Controllers\GuardarController@__invoke');
Route::get('/proveedores/ajax_get_detalle/{uuid}', 'Proveedores\Infrastructure\Controllers\GetDetalleController@__invoke');
