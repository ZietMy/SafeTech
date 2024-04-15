<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Home;
use App\Models\Users;
use App\Models\Product;
use App\Models\Order;
use App\Models\Upload;
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
         $img = Upload::all();
        $listRandomProduct =  $this->products->getRandom();
        $listFlashSale=$this->products->getFlashSale();
        $title = 'Homepage';
        if (Auth::id()){
            $role_id=Auth()->user()->role_id;
            $status_id=Auth()->user()->status_id;
            if($role_id==1 && $status_id==1){
                return view('clients.home ',compact('title','listProduct','listRandomProduct','listFlashSale','categories','img')); 
            }
            elseif($role_id==2){
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
        }else{
            return view('clients.home ',compact('title','listProduct','listRandomProduct','listFlashSale','categories','img'));
        }
    }
}
