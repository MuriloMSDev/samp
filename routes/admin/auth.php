<?php

Auth::routes([
    'register' => false,
    'verify'   => false
]);

Route::post('login', 'Auth\LoginController@login')->name('login');
