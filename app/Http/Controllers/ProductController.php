<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Categories;
use App\Models\Product;

class ProductController extends Controller
{
    private $products;
    public function __construct()
    {
        $this->products = new Product();
    }
    public function index(){
        $title = "Product";
        $categories = Categories::all();    
        $products =  $this->products->getAllProductByCategories();
        return view('clients.product',compact('title','categories','products'));
    }


}
