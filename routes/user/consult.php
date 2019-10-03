<?php

Route::group([
    'middleware' => ['auth:user'],
    'prefix' => 'consult',
    'as' => 'consults.',
], function () {
    Route::get('/language-tool', 'ConsultController@languageTool')
        ->name('language.tool');
});
