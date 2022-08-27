<?php

    use App\Http\Controllers\OrdersController;
    use App\Http\Controllers\PosController;
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
    })->name('home');
    Route::get('/login',function (){
       return to_route('filament.auth.login');
    })->name('login');

    Route::get('/logout',function (){
        Auth::logout();
       return to_route('home');
    })->name('logout');

    Route::middleware('auth')->group(function(){

    Route::get('pos/order', [PosController::class,'index'])->name('pos.order');
    Route::get('pos/history', [PosController::class,'history'])->name('pos.history');
    Route::get('pos/best-sellers', [PosController::class,'bestSellers'])->name('pos.best-sellers');
    });



    Route::resource('orders', OrdersController::class)
    ->only('store');

