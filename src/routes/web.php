<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
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

// Test Redis
Route::get('/store', function() {
    Redis::set('Bangkok', 'Krung Thep Maha Nakhon');
});

Route::get('/retrieve', function() {
    return Redis::get('Bangkok');
});

// Test Mailhog
Route::get('/send-email', function () {
    Mail::to('dev.phaiwan@dev.com')->send(new TestMail);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
