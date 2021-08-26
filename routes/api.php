<?php

use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::middleware(['auth:api'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::post('/refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
        Route::get('/user-profile', [AuthController::class, 'userProfile'])->name('auth.userProfile');
        Route::post('/change-password', [AuthController::class, 'changePassword'])->name('auth.changePassword');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.list');

    });
    Route::prefix('roles')->group(function () {
        Route::get('/list', [RoleController::class, 'getAllRoles']);
    });
});
//Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
//    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
//    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
//    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
//    Route::post('/refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
//    Route::get('/user-profile', [AuthController::class, 'userProfile'])->name('auth.userProfile');
//    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('auth.changePassword');
//});
