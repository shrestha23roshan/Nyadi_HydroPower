<?php

Route::namespace('Modules\Popup\Http\Controllers')->middleware('access:admin.popup')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('popup', 'PopupController', ['except' => 'show']);
});

