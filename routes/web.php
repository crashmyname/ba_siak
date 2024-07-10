<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/dashboard', function(){
    return view('dashboard');
});
// User
Route::get('/user',[UserController::class, 'user'])->name('user');
Route::post('/user',[UserController::class, 'addUser'])->name('adduser');
Route::post('/user/{id}',[UserController::class, 'updateUser'])->name('updateuser');
Route::delete('/user/{id}',[UserController::class, 'deleteUser'])->name('deleteuser');
