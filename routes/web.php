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
Route::get('/forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
Route::post('/forum/create', [ForumController::class, 'store'])->middleware(['auth'])->name('forum.store');
Route::post('/comment/create', [ForumController::class, 'storeComment'])->middleware(['auth'])->name('comment.store');


Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');

require __DIR__ . '/auth.php';
