<?php

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', 'DashboardController@index')
        ->name('dashboard');
});
