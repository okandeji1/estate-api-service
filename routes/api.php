<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\User;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\PropertyCategoryController;
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
], function () {
    Route::get('/get-users', [User::class,'index']);
});

// Property routes
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'v1/properties'
], function () {
    Route::get('/get-property-types', [PropertyTypeController::class, 'index']);
    Route::post('/property-type', [PropertyTypeController::class,'store']);

    Route::get('/get-property-categories', [PropertyCategoryController::class, 'index']);
    Route::post('/property-category', [PropertyCategoryController::class, 'store']);

    Route::post('/add-property', [PropertyController::class, 'store']);
});
