<?php

Route::namespace('Modules\MediaManagement\Http\Controllers')->middleware('access:admin.media-management')->prefix('admin/media-management')->name('admin.media-management.')->group(function(){
    //banner route
    Route::resource('banner', 'BannerController', ['except' => 'show']);
    //Gallery route
    Route::resource('album', 'AlbumController');
    // photo route
    Route::get('album/{id}/photo', 'AlbumPhotoController@show')->name('album.photo.show');
    Route::get('album/{id}/photo/create', 'AlbumPhotoController@create')->name('album.photo.create');
    Route::post('album/{id}/photo/store', 'AlbumPhotoController@store')->name('album.photo.store');
  
    Route::delete('album/photo/{id}', 'AlbumPhotoController@destroy');
    //video route
    Route::resource('video', 'VideoController', ['except' => 'show']);
});

//frontend
Route::group(['namespace' => 'Modules\MediaManagement\Http\Controllers\Frontend'], function(){
    Route::get('image-gallery', 'AlbumController@index')->name('image-gallery.index');
    Route::get('/album', 'AlbumController@album')->name('image-gallery.album');

    Route::get('/album1', 'AlbumController@album1')->name('image-gallery.album1');

    Route::get('/photo-{slug}', 'AlbumController@photo')->name('image-gallery.album.photo');

    Route::get('video', 'VideoController@index')->name('video.index');

});
