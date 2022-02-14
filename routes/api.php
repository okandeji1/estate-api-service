<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth route
Route::prefix('v1/auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class,'logout']);
});

// User routes
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'v1/users'
], function ($router) {
    Route::post('/user-login', [AuthController::class, 'login']);
    Route::get('/user-logout', [AuthController::class,'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
