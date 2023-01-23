<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Customer\BottleController;
use App\Http\Controllers\Admin\AdminBottleController;

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

Route::prefix('v1')->group(function () {
    Route::group([
        'prefix' => 'auth',
        'as' => 'auth.',
    ], function () {
        Route::post('register', [AuthenticationController::class, 'register']);
        Route::post('login', [AuthenticationController::class, 'login']);
    });
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });

    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function () {
        Route::apiResource('bottles', AdminBottleController::class);
        Route::post('/login', [AuthenticationController::class, 'adminLogin']);
    });

    Route::group([
        'as' => 'bottle.',
    ], function () {
        Route::apiResource('bottles', BottleController::class);
    });
});