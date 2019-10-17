<?php

Route::group([
    'middleware' => ['auth:admin'],
    'prefix' => 'account',
    'as' => 'account.',
], function () {
    Route::get('/', 'AccountController@edit')->name('edit');
    Route::put('/', 'AccountController@update')->name('update');
});
