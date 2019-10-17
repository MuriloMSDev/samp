<?php

Route::group([
    'prefix' => 'projects/{project}/classes/{class}/functions/{function}',
    'as' => 'projects.classes.functions.',
], function () {
    Route::resource('comments', 'CommentController')->only(['store']);
});

Route::get('comments/{comment}/vote-up', 'CommentController@voteUp')->name('comments.up');
Route::get('comments/{comment}/vote-down', 'CommentController@voteDown')->name('comments.down');
