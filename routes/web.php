<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function () {

    /**
    * Routes details plan
    */
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlansController@delete')->name('details.plans.delete');
    Route::get('plans/{url}/details/create', 'DetailPlansController@create')->name('details.plans.create');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlansController@show')->name('details.plans.show');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlansController@update')->name('details.plans.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlansController@edit')->name('details.plans.edit');
    Route::post('plans/{url}/details', 'DetailPlansController@store')->name('details.plans.store');
    Route::get('plans/{url}/details', 'DetailPlansController@index')->name('details.plans.index');
    /**
    * Routes plan
    */
    Route::get('plans/create', 'PlansController@create')->name('plans.create');
    Route::put('plans/{url}', 'PlansController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlansController@edit')->name('plans.edit');
    Route::any('plans/search', 'PlansController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlansController@delete')->name('plans.delete');
    Route::get('plans/{url}', 'PlansController@show')->name('plans.show');
    Route::post('plans', 'PlansController@store')->name('plans.store');
    Route::get('plans', 'PlansController@index')->name('plans.index');

    Route::get('/', "PlansController@index")->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
