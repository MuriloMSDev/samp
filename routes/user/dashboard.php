<?php

Route::get('/dashboard', 'DashboardController@index')
    ->middleware('auth:user')
    ->name('dashboard');
