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

Route::get('/admin', [AdminController::class,'index'])->name('admin');
Route::get('/admin/user',[AdminController::class,'index'])->name('user');
Route::get('/admin/user/create',[AdminController::class,'add'])->name('add');
Route::post('/admin/user/create',[AdminController::class,'postAdd'])->name('postAdd');
Route::get('/admin/user/edit/{id}', [AdminController::class, 'getEdit'])->name('edit');
Route::post('/admin/user/update', [AdminController::class, 'postEdit'])->name('postEdit');
Route::get('/admin/user/delete{id}',[AdminController::class, 'delete'])->name('delete');



Route::get('/admin/product', function(){
    return view('admin.product');
})->name('product');
Route::get('/admin/order', function(){
    return view('admin.order');
})->name('order');
Route::get('/admin/catogories', function(){
    return view('admin.categories');
})->name('categories');