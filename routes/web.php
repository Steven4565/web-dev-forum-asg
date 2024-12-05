<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ForumController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
Route::get('/forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');

Route::get('/counter', Counter::class);
