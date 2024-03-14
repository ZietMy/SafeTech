<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $title = 'Home Page';
        return view('users.homePage',compact('title'));
    }
}
