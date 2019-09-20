<?php

Route::namespace('Modules\InvestorRelations\Http\Controllers')->middleware('access:admin.investor-relations')->prefix('admin/investor-relations')->name('admin.investor-relations.')->group(function(){
    Route::resource('meeting', 'MeetingController');
    Route::resource('annualreport', 'AnnualReportController', ['except' => 'show']);
    Route::resource('financialreport', 'FinancialReportController', ['except' => 'show']);
});

//front end
Route::group(['namespace' => 'Modules\InvestorRelations\Http\Controllers\Frontend'], function(){
    Route::get('annual-report', 'AnnualReportController@index')->name('annual-report.index');

    Route::get('financial-report', 'FinancialReportController@index')->name('financial-report.index');

});