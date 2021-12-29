<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SachController;
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

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('home', [MainController::class, 'index']);

        #User
        Route::prefix('users')->group(function (){
            Route::get('view', [UserController::class, 'index']);
            Route::get('add', [UserController::class, 'create']);
            Route::post('add', [UserController::class, 'store']);
        });

        #DanhMuc
        Route::prefix('danhmuc')->group(function (){
            Route::get('add', [DanhMucController::class, 'create']);
            Route::post('add', [DanhMucController::class, 'store']);
            Route::get('list', [DanhMucController::class, 'index']);
            Route::get('edit/{danhMuc}', [DanhMucController::class, 'show']);
            Route::post('edit/{danhMuc}', [DanhMucController::class, 'update']);
            Route::DELETE('destroy', [DanhMucController::class, 'destroy']);
        });

        #Sach
        Route::prefix('sach')->group(function (){
            Route::get('add', [SachController::class, 'create']);
            Route::post('add', [SachController::class, 'store']);
            Route::get('list', [SachController::class, 'index']);
            Route::get('edit/{sach}', [SachController::class, 'show']);
            Route::post('edit/{sach}', [SachController::class, 'update']);
            Route::DELETE('destroy', [SachController::class, 'destroy']);
        });


    });
});
