<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', function(){
    return view('admin.layouts.admin');
})->name('admin');
Route::get('/admin/user', function(){
    return view('admin.user');
})->name('user');
Route::get('/admin/product', function(){
    return view('admin.product');
})->name('product');
Route::get('/admin/order', function(){
    return view('admin.order');
})->name('order');
Route::get('/admin/catogories', function(){
    return view('admin.categories');
})->name('categories');