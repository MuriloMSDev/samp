<?php

Route::group([
    'middleware' => ['auth:admin'],
    'prefix' => 'users',
    'as' => 'users.',
], function () {
    Route::get('/datatable', 'UserController@datatable')->name('datatable');
});

Route::resource('users', 'UserController')
    ->only(['index', 'edit', 'update'])
    ->middleware('auth:admin');
