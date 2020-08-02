<?php
Route::post('/register', 'Usuarios\Infrastructure\Controllers\CrearUsuarioController@register');
Route::get('/health_check', 'Usuarios\Infrastructure\Controllers\HealthCheckController@health_check');
