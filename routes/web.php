<?php

use App\Http\Controllers\KirimEmailController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('send', [SendEmailController::class, 'kirimnotifikasi']);
Route::get('send2', [KirimEmailController::class, 'index']);
