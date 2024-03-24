<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Categories;

class ProductController extends Controller
{
    public function index(){
        $title = "Product";
        $categories = Categories::all();
        return view('clients.product',compact('title','categories'));
    }

}
