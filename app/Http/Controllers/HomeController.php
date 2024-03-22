<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Home;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $products;
    private $categories;
    public function __construct()
    {
        
        $this->products = new Product();
        $this->categories = new Categories();
    }
    public function index(){
        $title = 'Homepage';
       $listProduct = Product::all();
       $categories = Categories::all();
    //    dd($categories);
       $listRandomProduct =  $this->products->getRandom();
       $listFlashSale=$this->products->getFlashSale();
        return view('clients.home',compact('title','listProduct','listRandomProduct','listFlashSale','categories'));
    }
}
