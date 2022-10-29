<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CurlHandlerController;
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
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/otps',[CurlHandlerController::class,'OtpPage'])->name('otp_page');
Route::post('/otp',[RegisteredUserController::class,'OtpSubmit'])->name('otp');

require __DIR__.'/auth.php';
