<?php

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::prefix('users')->group(function (){
    Route::get('view', [UserController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('home', [MainController::class, 'index']);

    });
});
