<?php

Route::group([
    'prefix' => 'projects/{project}',
    'as' => 'projects.',
], function () {
    Route::get('classes/{class}/functions-datatable', 'ClassController@functionsDatatable')->name('classes.functions.datatable');
    Route::resource('classes', 'ClassController')->only(['show']);
});
