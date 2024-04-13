<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;  
use App\Http\Controllers\CategoriesController; 
use App\Http\Controllers\Admin\AdminProductsController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WishListController;
use App\Models\Upload;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [DetailsController::class, 'detailId'])->name('clients.detail');
Route::get('/contact', [ContactController::class, 'index'])->name('client.contact');

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::resources([
        'products' => AdminProductsController::class,
       
    ]);
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/user', [AdminController::class, 'index'])->name('user');
    Route::get('/user/create', [AdminController::class, 'add'])->name('add_user');
    Route::post('/user/create', [AdminController::class, 'postAdd'])->name('postAdd_user');
    Route::get('/user/edit/{id}', [AdminController::class, 'getEdit'])->name('edit_user');
    Route::post('/user/update', [AdminController::class, 'postEdit'])->name('postEdit_user');
    Route::get('/user/delete/{id}', [AdminController::class, 'delete'])->name('delete_user');
});
Route::get('/admin/order', function () {
    return view('admin.order');
})->name('order');
Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories');

Route::get('/admin/categories/create', [CategoriesController::class, 'getCategories'])->name('categories.create');
Route::post('/admin/categories/create', [CategoriesController::class, 'postCategories'])->name('post-add');
Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'editCategories'])->name('categories.edit');
Route::post('/admin/categories/edit', [CategoriesController::class, 'postEditCategories'])->name('post-edit');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/wishlist', [WishListController::class, 'wishList'])->name('wishlist');
Route::post('/wishlist/add', [WishListController::class, 'addWishList'])->name('add-wish-list');
Route::get('/wishlist/delete/{id}', [WishListController::class, 'deleteWishList'])->name('delete-wish-list');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/contact',[ContactController::class,'adminContacs'])->name('contact-admin');
Route::get('/admin/contact/edit/{id}',[ContactController::class,'getContactId'])->name('update-contact');
Route::post('/admin/contact/update',[ContactController::class,'postUpdate'])->name('update');
Route::post('/contact/post', [ContactController::class, 'getForm'])->name('post-message');

Route::get('/admin/upload',[UploadController::class,'index'])->name('upload');
Route::get('admin/upload/create',[UploadController::class,'getUpload'])->name('uploadImg');
Route::post('/admin/upload/create',[UploadController::class,'postUpload'])->name('post-upload');
Route::get('/admin/upload/edit/{id}',[UploadController::class,'getEditUpload'])-> name('upload-edit');
Route::post('/admin/upload/edit',[UploadController::class,'postEditUpload'])->name('post-editUpload');
Route::get('admin/upload/delete/{id}',[UploadController::class,'deleteImg'])->name('delete-upload');

require __DIR__ . '/auth.php';
