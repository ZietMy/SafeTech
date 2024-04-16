<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $title = "Check out";
        return view('clients.checkout',compact('title'));
    }
}
