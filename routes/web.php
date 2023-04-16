<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
