<?php
Route::post('/login', 'Authorization\LoginAuthController@login');
Route::middleware('auth:api')->post('/logout', 'Authorization\logoutAuthController@logout');
