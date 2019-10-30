<?php

Route::group([
    'middleware' => ['auth:admin'],
    'prefix' => 'projects',
    'as' => 'projects.',
], function () {
    Route::get('/datatable', 'ProjectController@datatable')->name('datatable');
});

Route::resource('projects', 'ProjectController')
    ->only(['index'])
    ->middleware('auth:admin');
