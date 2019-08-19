<?php

Route::get('/dashboard', 'DashboardController@index')
    ->middleware('auth:admin')
    ->name('dashboard');
