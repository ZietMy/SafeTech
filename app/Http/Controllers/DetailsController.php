<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    private $products;
    public function __construct()
    {
        $this->products = new Product();
    }
    public function detailId($id) {
        $title = "Detail";
        $detailId = $this->products->getDetailId($id);
        $listRandomProduct =  $this->products->getRandom();
        $getProductRelated = $this->products->getProductRelated($id);
        if (auth()->check()) {
            $userId = auth()->id(); 
            $wishLists = Wishlist::where('user_id', $userId)->pluck('product_id')->toArray();
        }
        if (!empty($detailId)&& (auth()->check())) {
            return view('clients.detail', compact('title', 'detailId','listRandomProduct','getProductRelated','wishLists'));
        } else {
            return view('clients.detail', compact('title', 'detailId','listRandomProduct','getProductRelated'));
        }
    }
    
}
