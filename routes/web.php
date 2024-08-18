<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/p/{post}', [PostController::class, 'show']);
Route::get('/p/create', [PostController::class, 'create']);
Route::post('/p', [PostController::class, 'store']);


Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
