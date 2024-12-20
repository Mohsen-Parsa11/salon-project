<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;
use App\Http\Controllers\userController;
use App\Http\Controllers\reserveController;
use App\Http\Controllers\timesController;
use App\Http\Controllers\settingController;

Route::middleware('change_language')->group(function (){


Route::get('', function () {
    // the first page of site
    return view('home.home');
});


Route::prefix('admin')->group(function () {
    
    Route::get('change_language/{language}',[myController::class, 'change_language']);
    Route::get('dashboard', [myController::class, 'dashboard']);
    Route::get('users/user', [userController::class, 'User'])->name('users');
    Route::get('users/addUsers', [userController::class,'addUser']);
    Route::post('users/save', [userController::class,'save']);
    Route::get('users/edit/{id}', [userController::class,'editUser']);
    Route::put('users/update', [userController::class,'updateUser']);
    Route::delete('users/deleteUser/{id}', [userController::class,'deleteUser']);

    Route::get('reservation/reserve', [reserveController::class, 'reserve'])->name('reserve');
    Route::get('reservation/addReserve', [reserveController::class, 'addReserve']);
    Route::post('reservation/save', [reserveController::class, 'saveReserve']);
    Route::get('reservation/editReserve/{id}', [reserveController::class, 'editReserve']);
    Route::put('reservation/updateReserve', [reserveController::class, 'updateReserve']);
    Route::delete('reservation/reserveDelete/{id}', [reserveController::class, 'reserveDelete']);

    Route::get('times/time', [timesController::class, 'addTimes'])->name('times');
    Route::get('setting/set', [settingController::class, 'addSetting'])->name('setting');
});
});