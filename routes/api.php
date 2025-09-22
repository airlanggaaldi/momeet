<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/', [AccountController::class, 'login'])->name('login');
// Route::get('/hehe', function() {
//     return 'hehe';
// });
Route::get('/kota', [APIController::class, 'kota'])->name('kota');
Route::post('/add_sample', [APIController::class, 'add_sample'])->name('add_sample');

Route::get('/properties', [APIController::class, 'properties'])->name('properties');
Route::get('/best_seller', [APIController::class, 'best_seller'])->name('best_seller');
Route::get('/detail', [APIController::class, 'detail'])->name('detail');
Route::get('/favorite', [APIController::class, 'favorite'])->name('favorite');
Route::get('/history', [APIController::class, 'history'])->name('history');
Route::get('/user', [APIController::class, 'user'])->name('user');

Route::post('/booking', [APIController::class, 'booking'])->name('booking');
Route::post('/register', [APIController::class, 'register'])->name('register');
Route::post('/do_login', [LoginController::class, 'do_login'])->name('do_login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/contoh', function() {
//     return response()->json([
//         'name' => 'Abigail',
//         'state' => 'CA',
//     ]);
// });