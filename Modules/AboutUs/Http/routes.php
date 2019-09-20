<?php
//backend route
Route::namespace('Modules\AboutUs\Http\Controllers')->middleware('access:admin.about-us')->prefix('admin/about-us')->name('admin.about-us.')->group(function(){
    //companyprofile route
    Route::resource('company-profile', 'CompanyProfileController', ['only' => ['index', 'edit', 'update']]);
    //board of directors route
    Route::resource('bod' , 'BODController', ['except' => ['show']]);
    //team route
    Route::resource('team' , 'TeamController', ['except' => ['show']]);

});


//frontend

Route::group(['namespace' => 'Modules\AboutUs\Http\Controllers\Frontend'], function(){
    Route::get('company-profile', 'CompanyProfileController@index')->name('company-profile.index');

    Route::get('bod', 'BODController@index')->name('bod.index');

    Route::get('team', 'TeamController@index')->name('team.index');
});
