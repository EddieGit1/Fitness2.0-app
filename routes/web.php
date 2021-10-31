<?php

use App\Http\Controllers\BlogItemController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'],function (){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [BlogItemController::class, 'index'])->name('index');

Route::get('/create', [BlogItemController::class, 'create'])->middleware('auth');
Route::post('/create', [BlogItemController::class, 'store'])->name('store');

Route::delete('/home/{id}', [BlogItemController::class, 'destroy'])->name('destroy');

Route::get( '/edit/{id}', [BlogItemController::class, 'edit'])->name('edit')->middleware('auth');
Route::patch('{id}', [BlogItemController::class, 'update'])->name('update')->middleware('auth');

Route::get('/admin', [BlogItemController::class, 'admin'])->name('admin')->middleware('can:admin');
Route::get('/admin/status/{id}', [BlogItemController::class, 'postStatus'])->name('postStatus');


});
