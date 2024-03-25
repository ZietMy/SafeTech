<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Categories;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $products;
    private $wishList;
    public function __construct()
    {
        $this->products = new Product();
        $this->wishList = new Wishlist();
    }
    public function index()
    {
        $title = "Product";
        $categories = Categories::all();    
        $products =  $this->products->getAllProductByCategories();
        return view('clients.product', compact('title', 'categories', 'products'));
    }
}
