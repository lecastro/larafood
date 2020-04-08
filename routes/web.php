<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::any('plans/search', "PlansController@search")->name('plans.search');
    Route::get('plans', "PlansController@index")->name('plans.index');
    Route::get('plans/create', "PlansController@create")->name('plans.create');
    Route::get('plans/{url}', "PlansController@show")->name('plans.show');
    Route::post('plans', "PlansController@store")->name('plans.store');
    Route::delete('plans/{url}', "PlansController@delete")->name('plans.delete');
    Route::get('plans/{url}/edit', "PlansController@edit")->name('plans.edit');
    Route::put('/plans/{url}', "PlansController@update")->name('plans.update');

    Route::get('/', "PlansController@index")->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
