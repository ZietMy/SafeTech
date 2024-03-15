<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $products;
    public function __construct()
    {
        $this->products = new Product();
    }
    public function index(){
        $title = 'Homepage';
       $listProduct = Product::all();
       $listRandomProduct =  $this->products->getRandom();
       $listFlaseSale=$this->products->getFlaseSale();
        return view('clients.home',compact('title','listProduct','listRandomProduct','listFlaseSale'));
    }
}
