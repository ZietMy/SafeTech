<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\User\HomePageController;
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

Route::get('/',[HomeController::class,'index']);
Route::get('/detail/{id}', [DetailsController::class, 'detailId'])->name('clients.detail');
Route::get('/contact',[ContactController::class,'index'])->name('client.contact');
