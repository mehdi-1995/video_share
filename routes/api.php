<?php

use App\Http\Controllers\api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\VideoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('V1')->group(function () {
    Route::get('videos/{video:slug}', [VideoController::class, 'show']);
    Route::get('videos', [VideoController::class, 'index']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('videos', [VideoController::class, 'store']);
        Route::put('videos/{video:slug}', [VideoController::class, 'update']);
        Route::delete('videos/{video:slug}', [VideoController::class, 'destroy']);
        Route::get('auth/me', [AuthController::class, 'me']);
        Route::get('auth/logout', [AuthController::class, 'logout']);
    });
});


Route::get('V1/auth/login', [AuthController::class, 'login']);
