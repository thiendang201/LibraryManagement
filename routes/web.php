<?php

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\MainController;
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

//Route::get('admin/home', [MainController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    //
    Route::prefix('admin')->group(function (){
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('home', [MainController::class, 'index']);

//        #Category
//        Route::prefix('category')->group(function (){
//            Route::get('add', [CategoryController::class, 'create']);
//            Route::post('add', [CategoryController::class, 'store']);
//            Route::get('list', [CategoryController::class, 'index']);
//            Route::get('edit/{category}', [CategoryController::class, 'show']);
//            Route::post('edit/{category}', [CategoryController::class, 'update']);
//            Route::DELETE('destroy', [CategoryController::class, 'destroy']);
//        });


    });



});
