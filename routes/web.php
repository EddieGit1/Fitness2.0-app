<?php

use App\Http\Controllers\BlogItemController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [BlogItemController::class, 'index']);

Route::view('/create', [BlogItemController::class, 'create']);
Route::post('/create', [BlogItemController::class, 'store'])->name('store');

Route::view('/detail', [BlogItemController::class, 'detail']);

Route::delete('/home/{id}', [BlogItemController::class, 'destroy'])->name('destroy');


