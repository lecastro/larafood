<?php

use Illuminate\Support\Facades\Route;
Route::get('admin/plans', "Admin\PlansController@index")->name('plans.index');

Route::get('/', function () {
    return view('welcome');
});
