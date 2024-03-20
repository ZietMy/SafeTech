<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\User\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/detail/{id}', [DetailsController::class, 'detailId'])->name('clients.detail');
Route::get('/contact',[ContactController::class,'index'])->name('client.contact');
Route::get('/admin', function(){
    return view('admin.blocks.card');
})->name('admin');
Route::get('/admin/user',[AdminController::class,'index'])->name('user');
Route::get('/admin/product', function(){
    return view('admin.product');
})->name('product');
Route::get('/admin/order', function(){
    return view('admin.order');
})->name('order');
Route::get('/admin/catogories', function(){
    return view('admin.categories');
})->name('categories');