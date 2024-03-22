<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $users=DB::select('select * from users ');
        return view('admin.user', compact('users'));
    }
}
