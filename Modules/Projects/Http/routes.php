<?php

Route::namespace('Modules\Projects\Http\Controllers')->middleware('access:admin.projects')->prefix('admin/projects')->name('admin.projects.')->group(function(){
    Route::resource('nhp', 'NHPController', ['except' => 'show']);
    Route::resource('progressreport', 'ProgressReportController', ['except' => 'show']);
    Route::resource('salient_features', 'SalientFeatureController', ['except' => 'show']);
});

//frontend route

Route::group(['namespace' => 'Modules\Projects\Http\Controllers\Frontend'], function(){
    Route::get('nhp', 'NHPController@index')->name('nhp.index');

    Route::get('progress-report', 'ProgressReportController@index')->name('progress-report.index');
    
    Route::get('salient-features', 'SailentFeatureController@index')->name('salient-features.index');
});