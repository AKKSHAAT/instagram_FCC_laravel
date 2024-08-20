<?php

use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::post('follow/{user}', [FollowsController::class, 'store']);


Route::get('/p/create', [PostController::class, 'create']);
Route::post('/p', [PostController::class, 'store']);
Route::get('/p/{post}', [PostController::class, 'show']);


Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profiles.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profiles.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profiles.update');
