<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\User\HomePageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;  
use App\Http\Controllers\CategoriesController; 
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
Route::get('/contact',[ContactController::class,'index'])->name('client.contact');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/user', [AdminController::class, 'index'])->name('user');
    Route::get('/user/create', [AdminController::class, 'add'])->name('add_user');
    Route::post('/user/create', [AdminController::class, 'postAdd'])->name('postAdd_user');
    Route::get('/user/edit/{id}', [AdminController::class, 'getEdit'])->name('edit_user');
    Route::post('/user/update', [AdminController::class, 'postEdit'])->name('postEdit_user');
    Route::get('/user/delete/{id}', [AdminController::class, 'delete'])->name('delete_user');
});




Route::get('/admin/product', function(){
    return view('admin.product');
})->name('product')->middleware(['auth', 'admin']);
Route::get('/admin/order', function () {
    return view('admin.order');
})->name('order');
Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories');

Route::get('/admin/categories/create', [CategoriesController::class, 'getCategories'])->name('categories.create');
Route::post('/admin/categories/create', [CategoriesController::class, 'postCategories'])->name('post-add');
Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'editCategories'])->name('categories.edit');
Route::post('/admin/categories/edit', [CategoriesController::class, 'postEditCategories'])->name('post-edit');
// user login logout
// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
