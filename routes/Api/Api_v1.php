<?php

use App\Http\Controllers\Api\PhoneBooksController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->group( function () {

    Route::apiResource('phoneBooks', PhoneBooksController::class);

});


require __DIR__.'/Auth/Api_Auth.php';
