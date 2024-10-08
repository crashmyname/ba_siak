<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\SuratMController;
use App\Http\Controllers\SuratKController;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login',[UserController::class, 'Login'])->name('login');
Route::post('/login',[UserController::class, 'onLogin'])->name('onlogin');
Route::middleware(['auth'])->group(function () {
    Route::post('/logout',[UserController::class, 'logOut'])->name('logout');
    Route::get('/dashboard',[UserController::class, 'Dashboard'])->name('dashboard');
    // User
    Route::get('/user',[UserController::class, 'user'])->name('user');
    Route::post('/user',[UserController::class, 'addUser'])->name('adduser');
    Route::post('/user/{id}',[UserController::class, 'updateUser'])->name('updateuser');
    Route::delete('/user/{id}',[UserController::class, 'deleteUser'])->name('deleteuser');
    // Product
    Route::get('/product',[ProductController::class, 'product'])->name('product');
    Route::post('/product',[ProductController::class, 'addProduct'])->name('addproduct');
    Route::post('/product/{id}',[ProductController::class, 'updateProduct'])->name('updateproduct');
    Route::delete('/product/{id}',[ProductController::class, 'deleteProduct'])->name('deleteproduct');
    // Detail Product
    Route::get('/dproduct/{id}',[DetailProductController::class, 'detailproduct'])->name('dproduct');
    Route::get('/dproducts/{id}',[SuratMController::class, 'detailProduct'])->name('detailProduct');
    Route::post('/dproduct/{id}',[DetailProductController::class, 'addDetail'])->name('adddetail');
    // Surat Masuk
    Route::get('/suratmasuk',[SuratMController::class, 'suratmasuk'])->name('suratmasuk');
    Route::post('/suratmasuk',[SuratMController::class, 'addSuratmasuk'])->name('addsuratmasuk');
    Route::post('/suratmasuk/{id}',[SuratMController::class, 'updateSuratmasuk'])->name('updatesuratmasuk');
    Route::delete('/suratmasuk/{id}',[SuratMController::class, 'deleteSuratmasuk'])->name('deletesuratmasuk');
    Route::get('/reportsuratmasuk',[SuratMController::class, 'reportSuratMasuk'])->name('reportsuratmasuk');
    Route::get('/reportsuratmasuk/{id}/{tanggal}',[SuratMController::class, 'pdfSuratMasuk'])->name('pdfsuratmasuk');
    // Surat Keluar
    Route::get('/suratkeluar',[SuratKController::class, 'suratkeluar'])->name('suratkeluar');
    Route::post('/suratkeluar',[SuratKController::class, 'addSuratkeluar'])->name('addsuratkeluar');
    Route::post('/suratkeluar/{id}',[SuratKController::class, 'updateSuratkeluar'])->name('updatesuratkeluar');
    Route::delete('/suratkeluar/{id}',[SuratKController::class, 'deleteSuratkeluar'])->name('deletesuratkeluar');
    Route::get('/reportsuratkeluar',[SuratKController::class, 'reportSuratKeluar'])->name('reportsuratkeluar');
    Route::get('/reportsuratkeluar/{id}/{tanggal}',[SuratKController::class, 'pdfSuratKeluar'])->name('pdfsuratkeluar');
});
