<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\MomeetController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/belajar', [AccountController::class, 'belajar'])->name('belajar');
Route::get('/get_data', [AccountController::class, 'get_data']);

Route::get('/', [AccountController::class, 'login'])->name('login');
Route::post('/do_login', [AccountController::class, 'do_login'])->name('do_login');
Route::get('/signup', [AccountController::class, 'signup'])->name('signup');
Route::post('/do_signup', [AccountController::class, 'do_signup'])->name('do_signup');

Route::get('/home', [AccountController::class, 'home'])->name('home');
Route::get('/about', [AccountController::class, 'about'])->name('about');
Route::get('/order', [AccountController::class, 'order'])->name('order');
Route::middleware(['auth'])->group(function () {
    Route::post('/contact', [MomeetController::class, 'contact'])->name('contact');
    Route::get('/showContact', [MomeetController::class, 'showContact'])->name('showContact');
    Route::get('/approveAds', [MomeetController::class, 'approveAds'])->name('approveAds');
    Route::get('/approvingAds/{id}', [MomeetController::class, 'approvingAds'])->name('approvingAds');
    Route::get('/rejectingAds/{id}', [MomeetController::class, 'rejectingAds'])->name('rejectingAds');

    Route::get('/contactUs', [AccountController::class, 'contactUs'])->name('contactUs');
    Route::get('/getProperty', [AccountController::class, 'getProperty'])->name('getProperty');
    Route::get('/getPropertyBulan', [AccountController::class, 'getPropertyBulan'])->name('getPropertyBulan');
    Route::get('/bookmark', [AccountController::class, 'bookmark'])->name('bookmark');
    Route::get('/addBookmark/{id}', [AccountController::class, 'addBookmark'])->name('addBookmark');
    Route::get('/hapusBookmark/{id}', [AccountController::class, 'hapusBookmark'])->name('hapusBookmark');

    Route::get('/status', [StatusController::class, 'pending'])->name('pending');
    Route::get('/status/approve/{id}', [StatusController::class, 'approve'])->name('approve');
    Route::get('/status/reject/{id}', [StatusController::class, 'reject'])->name('reject');
    Route::get('/acc/{id}', [StatusController::class, 'acc'])->name('acc');
    Route::get('/cancel/{id}', [StatusController::class, 'cancel'])->name('cancel');

    Route::get('/kota', [KotaController::class, 'kota'])->name('kota');
    Route::get('/kota/editKota/{id}', [KotaController::class, 'editKota'])->name('editKota');
    Route::put('/kota/editKota/{id}', [KotaController::class, 'doEditKota'])->name('doEditKota');
    Route::get('/kota/hapusKota/{id}', [KotaController::class, 'hapusKota'])->name('hapusKota');
    Route::get('/add-kota', [KotaController::class, 'addKota'])->name('addKota');
    Route::post('/add-kota', [KotaController::class, 'doAddKota'])->name('doAddKota');

    // Route::get('/order', [AccountController::class, 'show'])->name('show');

    Route::get('/booking/{id}', [OrderController::class, 'booking'])->name('booking');
    Route::post('/orderProperties/{id}', [OrderController::class, 'orderProperties'])->name('orderProperties');
    Route::get('/myOrder', [OrderController::class, 'myOrder'])->name('myOrder');
    Route::get('/propertiOrder/{id}', [OrderController::class, 'propertiOrder'])->name('propertiOrder');
    Route::get('/adminOrder', [OrderController::class, 'adminOrder'])->name('adminOrder');
    Route::get('/review/{id}', [OrderController::class, 'review'])->name('review');
    Route::post('/complete/{id}', [OrderController::class, 'complete'])->name('complete');

    Route::get('/properties', [PropertyController::class, 'properties'])->name('properties');
    Route::get('/properties/update', [PropertyController::class, 'update'])->name('update');
    Route::get('/properties/update/{id}', [PropertyController::class, 'updateForm'])->name('updateForm');
    Route::put('/properties/update/{id}', [PropertyController::class, 'updateProperties'])->name('updateProperties');
    Route::get('/properties/hapus/{id}', [PropertyController::class, 'hapus'])->name('hapus');
    Route::get('/add-properties', [PropertyController::class, 'addProperties'])->name('addProperties');
    Route::post('/add-properties', [PropertyController::class, 'doAddProperties'])->name('doAddProperties');
    Route::get('/ads/{id}', [PropertyController::class, 'ads'])->name('ads');
    Route::post('/addAds/{id}', [PropertyController::class, 'addAds'])->name('addAds');
    Route::get('/hapusAds/{id}', [PropertyController::class, 'hapusAds'])->name('hapusAds');

    Route::get('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    })->name('logout');
});
