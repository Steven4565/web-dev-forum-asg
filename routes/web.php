<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/', 'landing')->name('landing');
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create', [ForumController::class, 'create'])->middleware(['auth'])->name('forum.create');
Route::get('/explore/create', [ExploreController::class, 'create'])->middleware(['auth'])->name('explore.create');
Route::post('/explore/store', [ExploreController::class, 'store'])->middleware(['auth'])->name('explore.store');
Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');

require __DIR__ . '/auth.php';
