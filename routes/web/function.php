<?php

Route::group([
    'prefix' => 'projects/{project}/classes/{class}',
    'as' => 'projects.classes.',
], function () {
    Route::resource('functions', 'FunctionController')->only(['show']);
});
