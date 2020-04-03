<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/plans', "Admin\PlansController@index")->name('plans.index');
Route::get('admin/plans/create', "Admin\PlansController@create")->name('plans.create');
Route::post('admin/plans', "Admin\PlansController@store")->name('plans.store');

Route::get('/', function () {
    return view('welcome');
});
