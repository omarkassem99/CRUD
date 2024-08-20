<?php

use App\Http\Controllers\greetController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PostController::class)->group(function()
{

    Route::middleware('auth')->group(function()
    {
        Route::get('index','index');
        Route::get('index/create','create');
        Route::post('index/insert','insert');

        Route::get('index/update/{id}','updateForm');
        Route::post('index/update/{id}','update');

        Route::delete('index/{id}','delete')->name('delete');

        Route::post('index/{id}','show');
    });
});

Route::controller(UserController::class)->group(function()
{
    Route::middleware('guest')->group(function()
    {
        
        Route::get('register','registerForm');
        Route::post('register','register');
        
        Route::get('login','loginForm');
        Route::post('login','login')->name('login');
        
    });

    Route::middleware('auth')->group(function()
    {
        Route::post('logout','logout');
        Route::get('users/','ShowUsers');
    });
});