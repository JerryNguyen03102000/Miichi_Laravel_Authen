<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;


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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'checkLogin'])->name('login.check');
Route::get('/register/admin', [AuthController::class, 'adminRegister'])->name('register.admin.form');
Route::post('/register/admin', [AuthController::class, 'adminRegisterSave'])->name('register.admin.save');

Route::get('/register/user', [AuthController::class, 'userRegister'])->name('register.user.form');
Route::post('/register/user', [AuthController::class, 'userRegisterSave'])->name('register.user.save');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// route home
Route::prefix('dashboard')->middleware('multiAuth')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/user/detail/{id}', [MainController::class, 'detail'])->name('user.detail');
    Route::get('/user/create', [MainController::class, 'create'])->name('user.create');
    Route::post('/user/create', [MainController::class, 'store'])->name('user.create.store');
    Route::get('/user/edit/{id}', [MainController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit/{id}', [MainController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [MainController::class, 'delete'])->name('user.delete');
});
