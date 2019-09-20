<?php

Route::namespace('Modules\Pages\Http\Controllers')->middleware('access:admin.pages')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('pages', 'PagesController', ['except' => 'show']);
});


//frontend
Route::namespace('Modules\Pages\Http\Controllers\Frontend')->group(function() {
    Route::get('/pages-{slug}', 'PageController@show')->name('pages.show');
});