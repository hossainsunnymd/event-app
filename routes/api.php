<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//users
Route::get('/users',[UserController::class,'listUser'])->name('listUser');
Route::get('/user-by-id',[UserController::class,'userById'])->name('userById');
Route::post('/create-user',[UserController::class,'createUser'])->name('createUser');
Route::post('/update-user',[UserController::class,'updateUser'])->name('updateUser');
Route::get('/delete-user',[UserController::class,'deleteUser'])->name('deleteUser');


//user registration
Route::post('/user-registration',[AuthController::class,'userRegistration'])->name('userRegistration');

//user login
Route::post('/user-login',[AuthController::class,'userLogin'])->name('userLogin');

//events
Route::get('/events',[EventController::class,'listEvent'])->name('listEvent');
