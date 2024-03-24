<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Home;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $listProduct = Product::all();
        $categories = Categories::all();
     //    dd($categories);
        $listRandomProduct =  $this->products->getRandom();
        $listFlashSale=$this->products->getFlashSale();
        $title = 'Homepage';
        if (Auth::id()){
            $role_id=Auth()->user()->role_id;
            $status_id=Auth()->user()->status_id;
            if($role_id==1 && $status_id==1){
                return view('clients.home ',compact('title','listProduct','listRandomProduct','listFlashSale','categories')); 
            }
            elseif($role_id==2){
                return view('admin.blocks.card');
            }
        }else{
            return view('clients.home ',compact('title','listProduct','listRandomProduct','listFlashSale','categories'));
        }
    }
}
