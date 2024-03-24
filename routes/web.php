<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\User\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{id}', [DetailsController::class, 'detailId'])->name('clients.detail');
Route::get('/contact', [ContactController::class, 'index'])->name('client.contact');
Route::get('/admin', function () {
    return view('admin.blocks.card');
})->name('admin');
Route::get('/admin/user', [AdminController::class, 'index'])->name('user');
Route::get('/admin/product', function () {
    return view('admin.product');
})->name('product');
Route::get('/admin/order', function () {
    return view('admin.order');
})->name('order');

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories');

Route::get('/admin/categories/create', [CategoriesController::class, 'getCategories'])->name('categories.create');
Route::post('/admin/categories/create', [CategoriesController::class, 'postCategories'])->name('post-add');
Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'editCategories'])->name('categories.edit');
Route::post('/admin/categories/edit', [CategoriesController::class, 'postEditCategories'])->name('post-edit');

Route::get('/products',[ProductController::class,'index'])->name('product');
