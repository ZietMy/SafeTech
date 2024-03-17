<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $title = "Contact us";
        return view('clients.contact',compact('title'));
    }
}
