<?php

Route::group([
    'prefix' => 'projects',
    'as' => 'projects.',
], function () {
    Route::get('{project}/classes-datatable', 'ProjectController@classesDatatable')->name('classes.datatable');
});

Route::resource('projects', 'ProjectController')->only(['show']);
