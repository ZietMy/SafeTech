<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Order;

class HomeAdminController extends Controller
{
    public function home()
    {
        $totalUsers = Users::count();
        // dd($totalUsers);
        $totalCategories = Categories::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        return view('admin.blocks..card')
        ->with('totalUsers', $totalUsers)
        ->with('totalCategories', $totalCategories)
        ->with('totalProducts', $totalProducts)
        ->with('totalOrders', $totalOrders);
    }
}
