<?php

use App\Http\Controllers\BorangController;
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
    return view('borang');
});

Route::post('borang', [BorangController::class, 'store'])->name('borang.store');

Route::get('borang/{borang}/pengesahan', [BorangController::class, 'pengesahan'])->name('borang.pengesahan');

Route::post('borang/{borang}/pengesahan', [BorangController::class, 'pengesahan_store'])->name('borang.pengesahan.store');
