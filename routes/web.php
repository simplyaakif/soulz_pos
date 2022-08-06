<?php

    use App\Http\Controllers\OrdersController;
    use App\Http\Controllers\PosController;
    use App\Models\Item;
    use Illuminate\Support\Facades\Route;
    use Inertia\Inertia;

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

    Route::get('pos/counter', [PosController::class,'index']);

    Route::resource('orders', OrdersController::class)
    ->only('store');

