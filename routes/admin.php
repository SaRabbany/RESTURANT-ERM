<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrintersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TableForWaiterController;
use App\Http\Controllers\userController;
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
//


Route::middleware(['auth:sanctum'])->group(function(){

        Route::get('/', function () {
            return view('admin.index');
        })->name('dashboard');

        Route::resource('printers', PrintersController::class);
        Route::resource('users', userController::class);
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tables', TableController::class);

    Route::post('tables/{id}',[TableController::class,'show'])->name('tableShow');


        Route::resource('employees', TableForWaiterController::class);
        Route::resource('orders', OrderController::class);



        Route::post('tableupdate',[TableController::class,'updateStatus'])->name('tableupdate');

});



