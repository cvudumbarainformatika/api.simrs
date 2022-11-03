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
Route::get('send2/{id}', [KirimEmailController::class, 'index']);
Route::get('testview', [KirimEmailController::class, 'viewpesan']);
// Route::get('testview', [KirimEmailController::class, 'sendMail']);
// Route::get('send3', function () {
//     $key = ([
//         'name' => 'farhan',
//         'email' =>  'faran.f4124n@gmail.com',
//     ]);
//     $data = KirimEmailController::index($key);
//     return response()->json([$key, $data], 200);
// });
