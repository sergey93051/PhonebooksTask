<?php

use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:api')->group( function () {

    Route::post('register',RegisterController::class);
    Route::post('login', LoginController::class);

});

Route::post('logout',[MainController::class,'logout'])->middleware('auth:api');
