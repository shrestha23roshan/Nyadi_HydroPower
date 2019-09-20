<?php

Route::namespace('Modules\NewsAndUpdate\Http\Controllers')->middleware('access:admin.news')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('news', 'NewsController', ['except' => 'show']);
});


Route::group(['namespace'=> 'Modules\NewsAndUpdate\Http\Controllers\Frontend'],function(){
    Route::get('/news-{id}', 'NewsController@show')->name('news.show');
});