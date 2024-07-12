<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
    Route::get('/dashboard', function(){
        return view('dashboard');
    });
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
    // Surat Masuk
    Route::get('/suratmasuk',[SuratMController::class, 'suratmasuk'])->name('suratmasuk');
    Route::post('/suratmasuk',[SuratMController::class, 'addSuratmasuk'])->name('addsuratmasuk');
    Route::post('/suratmasuk/{id}',[SuratMController::class, 'updateSuratmasuk'])->name('updatesuratmasuk');
    Route::delete('/suratmasuk/{id}',[SuratMController::class, 'deleteSuratmasuk'])->name('deletesuratmasuk');
    // Surat Keluar
    Route::get('/suratkeluar',[SuratKController::class, 'suratkeluar'])->name('suratkeluar');
    Route::post('/suratkeluar',[SuratKController::class, 'addSuratkeluar'])->name('addsuratkeluar');
    Route::post('/suratkeluar/{id}',[SuratKController::class, 'updateSuratkeluar'])->name('updatesuratkeluar');
    Route::delete('/suratkeluar/{id}',[SuratKController::class, 'deleteSuratkeluar'])->name('deletesuratkeluar');
});
