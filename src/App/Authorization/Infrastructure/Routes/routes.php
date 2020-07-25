<?php
Route::post('/login', 'Authorization\Infrastructure\Controllers\LoginAuthController@login');
Route::middleware('auth:api')->post('/logout', 'Authorization\Infrastructure\Controllers\logoutAuthController@logout');
