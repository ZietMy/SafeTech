<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        if (!empty($detailId)) {
            return view('clients.detail', compact('title', 'detailId','listRandomProduct','getProductRelated'));
        } else {
            
        }
    }
    
}
