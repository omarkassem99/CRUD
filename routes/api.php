<?php

use App\Http\Controllers\API\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
    Route::get('/users',[AuthController::class,'ShowUsers']);
});



Route::controller(PostController::class)->group(function()
{
    Route::middleware('auth:api')->group(function()
    {
        Route::get('/index','index');
        Route::get('index/{id}','show');
        Route::post('index/insert','insert');
        Route::post('index/update/{id}','update');
        Route::post('index/delete/{id}','delete');
        
    });
});
