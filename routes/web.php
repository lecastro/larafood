<?php

use Illuminate\Support\Facades\Route;

Route::any('admin/plans/search', "Admin\PlansController@search")->name('plans.search');
Route::get('admin/plans', "Admin\PlansController@index")->name('plans.index');
Route::get('admin/plans/create', "Admin\PlansController@create")->name('plans.create');
Route::get('admin/plans/{url}', "Admin\PlansController@show")->name('plans.show');
Route::post('admin/plans', "Admin\PlansController@store")->name('plans.store');
Route::delete('admin/plans/{url}', "Admin\PlansController@delete")->name('plans.delete');
Route::get('admin/plans/{url}/edit', "Admin\PlansController@edit")->name('plans.edit');
Route::put('admin/plans/{url}', "Admin\PlansController@update")->name('plans.update');

Route::get('admin', "Admin\PlansController@index")->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});
