<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;


Route::get('', function () {
    // the first page of site
    return view('home.home');
});

Route::get('admin/dashboard', [myController::class, 'dashboard']);
