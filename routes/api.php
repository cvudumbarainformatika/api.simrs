<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KirimEmailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UserController;
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

Route::middleware('api')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/{id}', [UserController::class, 'update']);

    Route::post('/registeredit/{id}', [RegisterController::class, 'update']);
    Route::post('/updatefull/{id}', [RegisterController::class, 'updateFull']);

    Route::get('/send', [SendEmailController::class, 'kirimnotifikasi']);
    // Route::post('/registeruser', [RegisterController::class, 'registeruser']);
});

Route::controller(RegisterController::class)->group(function () {
    Route::post('/registeruser', 'registeruser');
    Route::get('/registerme/{id}', 'show');
    Route::get('/dataregister', 'index');
});





// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::get('user', 'me');
//     Route::post('register', 'register');
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');
// });
