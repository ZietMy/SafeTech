<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminOrderController;
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
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::post('/contact/post', [ContactController::class, 'getForm'])->name('post-message');

Route::middleware('auth')->group(function () {
Route::get('/wishlist', [WishListController::class, 'getAllWishList'])->name('wishlist');
Route::post('/wishlist/add', [WishListController::class, 'addWishList'])->name('add-wish-list');
Route::get('/wishlist/delete/{id}', [WishListController::class, 'deleteWishList'])->name('delete-wish-list');
Route::get("cart",[CartController::class, 'index'])->name('cart');
Route::post("cart/store",[CartController::class, 'addToCart'])->name('cart.store');
Route::post('cart/increment/{cartId}', [CartController::class, 'increment'])->name('cart.increment');
Route::post('cart/decrement/{cartId}', [CartController::class, 'decrement'])->name('cart.decrement');
Route::get('/delete-cart/{cartId}', [CartController::class, 'deleteCart'])->name('cart.delete');
Route::get('/delete-all-cart', [CartController::class, 'deleteAllCart'])->name('cart.deleteAll');

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout',[CheckoutController::class,'checkout'])->name('checkout.store');
Route::get('/checkout-successfully',function(){
    return view('clients.checkoutSuccessfully');
})->name('checkout.successfully');
// Show order
Route::get('/history/order',[ProfileController::class,'showHistoryOrder'])->name('history.order');
Route::post('/order-cancel/{id}',[ProfileController::class,'cancelOrder'])->name('cancel-order');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin');

    Route::get('/user', [AdminController::class, 'index'])->name('user');
    Route::get('/user/create', [AdminController::class, 'add'])->name('add_user');
    Route::post('/user/create', [AdminController::class, 'postAdd'])->name('postAdd_user');
    Route::get('/user/edit/{id}', [AdminController::class, 'getEdit'])->name('edit_user');
    Route::post('/user/update', [AdminController::class, 'postEdit'])->name('postEdit_user');
    Route::get('/user/delete/{id}', [AdminController::class, 'delete'])->name('delete_user');
    Route::resources([
        'products' => AdminProductsController::class,

    ]);
    Route::get('/order', [AdminOrderController::class, 'index'])->name('order');
    Route::get('/order/{id}/view', [AdminOrderController::class, 'viewOrder'])->name('viewOrderDetail');
    Route::put('orders/{id}/update/',  [AdminOrderController::class, 'updateOrder'])->name('admin.update.order');
    // Route::get('edit/{id}', [AdminOrderController::class, 'getEditOrder'])->name('EditOrder');
    // Route::post('edit/{id}', [AdminOrderController::class, 'postEditOrder'])->name('postEditOrder');

    Route::get('contact', [ContactController::class, 'adminContact'])->name('contact-admin');
    Route::get('contact/edit/{id}', [ContactController::class, 'getContactId'])->name('update-contact');
    Route::post('contact/update', [ContactController::class, 'postUpdate'])->name('update');

    Route::get('upload', [UploadController::class, 'index'])->name('upload');
    Route::get('upload/create', [UploadController::class, 'getUpload'])->name('uploadImg');
    Route::post('upload/create', [UploadController::class, 'postUpload'])->name('post-upload');
    Route::get('upload/edit/{id}', [UploadController::class, 'getEditUpload'])->name('upload-edit');
    Route::post('upload/edit', [UploadController::class, 'postEditUpload'])->name('post-editUpload');
    Route::get('/upload/delete/{id}', [UploadController::class, 'deleteImg'])->name('delete-upload');

    Route::get('categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('categories/create', [CategoriesController::class, 'getCategories'])->name('categories.create');
    Route::post('categories/create', [CategoriesController::class, 'postCategories'])->name('post-add');
    Route::get('categories/edit/{id}', [CategoriesController::class, 'editCategories'])->name('categories.edit');
    Route::post('categories/edit', [CategoriesController::class, 'postEditCategories'])->name('post-edit');
    Route::get('categories/delete/{id}', [CategoriesController::class, 'deleteCategories'])->name('categories.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.user');
    Route::post('/profile/edit', [ProfileController::class, 'postEdit'])->name('profile.edit');
    Route::get('/profile/edit',[ProfileController::class,'getEdit'])->name('profile.getEdit');
});


require __DIR__ . '/auth.php';
