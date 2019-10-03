<?php

Route::group([
    'middleware' => ['auth:user'],
    'prefix' => 'projects',
    'as' => 'projects.',
], function () {
    Route::get('/datatable', 'ProjectController@datatable')->name('datatable');
});

Route::resource('projects', 'ProjectController')
    ->middleware('auth:user');
