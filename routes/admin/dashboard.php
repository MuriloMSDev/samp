<?php

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');
});
