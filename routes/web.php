<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('categories/{category:slug}/videos', [CategoryController::class, 'index'])->name('category.videos');
Route::prefix('videos')->group(function () {
    Route::get('create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('', [VideoController::class, 'store'])->name('videos.store');
    Route::get('{video}/edit', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('{video}', [VideoController::class, 'update'])->name('video.update');
    Route::get('{video}/show', [VideoController::class, 'show'])->name('video.show');
    Route::get('{video}/delete', [VideoController::class, 'destroy'])->name('video.delete');
});

Route::post('videos/{video}/comment', [CommentController::class, 'create'])->name('videos.comment.create');
Route::get('{likeable_type}/{likeable_id}/like', [LikeController::class, 'create'])->name('like.create');
Route::get('{likeable_type}/{likeable_id}/dislike', [DislikeController::class, 'create'])->name('dislike.create');
